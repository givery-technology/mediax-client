<?php

App::uses('AppController', 'Controller');

/**
 * Keywords Controller
 *
 * @property Keyword $Keyword
 */
class KeywordsController extends AppController
{

/**
 * index method
 *
 * @return void
 */
    public function index()
    {
        set_time_limit(0);
        $conds = [];
        $fields = [];
        
        if ($this->request->is('post') && !empty($this->request->data['Keyword']['keyword'])) {
            $conds['OR']['Keyword.keyword LIKE'] = '%' . mb_strtolower(trim($this->request->data['Keyword']['keyword']), 'UTF-8') . '%';
            $conds['OR']['Keyword.url LIKE'] = '%' . mb_strtolower(trim($this->request->data['Keyword']['keyword']), 'UTF-8') . '%';
        }
        $this->Keyword->recursive = 0;
        
        $fields = [
            'Keyword.ID', 'Keyword.UserID', 'Keyword.Keyword', 'Keyword.Url', 'Keyword.Enabled', 'Keyword.Price', 'Keyword.nocontract', 'Keyword.Penalty', 'Keyword.created', 'Keyword.updated',
            'User.id', 'User.company', 'User.name', 'User.loginip', 'User.logintime'
        ];
        
        $keywords = $this->Keyword->find('all', ['conditions' => $conds, 'fields' => $fields, 'order' => 'Keyword.ID DESC']);
        $now = time();
        $two_weeks = 7*24*60*60;
        
        # Add field NewKeyword
        $loop = 0;
        foreach ($keywords as $keyword) {
            $created_date = strtotime($keyword['Keyword']['created']);
            if ($now - $created_date > $two_weeks) {
                $keywords[$loop]['Keyword']['NewKeyword'] = 0;
            } else {
                $keywords[$loop]['Keyword']['NewKeyword'] = 1;
            }
            $loop++;
        }
        $this->set('keywords', $keywords);
    }
    
/**
 * nocontractlist method
 *
 * @return void
 */
    public function nocontractlist()
    {
        set_time_limit(0);
        $conds = [];
        $fields = [];
        
        $conds['Keyword.Enabled'] = 1;
        $conds['Keyword.nocontract'] = 1;
        $conds['Keyword.rankend'] = 0;
        
        $this->Keyword->recursive = 0;
        
        $fields = [
            'Keyword.ID', 'Keyword.UserID', 'Keyword.Keyword', 'Keyword.Url', 'Keyword.Enabled', 'Keyword.Price', 'Keyword.nocontract', 'Keyword.Penalty', 'Keyword.created', 'Keyword.updated',
            'User.id', 'User.company', 'User.name', 'User.loginip', 'User.logintime'
        ];
        
        $keywords = $this->Keyword->find('all', ['conditions' => $conds, 'fields' => $fields, 'order' => 'Keyword.ID DESC']);
        $this->set('keywords', $keywords);
    }
    
/**
 * kaiyakulist method
 *
 * @return void
 */
    public function kaiyakulist()
    {
        set_time_limit(0);
        $conds = [];
        $fields = [];
        
        $conds['Keyword.nocontract'] = 0;
        $conds['Keyword.rankend <>'] = 0;
        $conds['Keyword.rankend <'] = date('Ymd');
        
        $this->Keyword->recursive = 0;
        
        $fields = [
            'Keyword.ID', 'Keyword.UserID', 'Keyword.Keyword', 'Keyword.Url', 'Keyword.Enabled', 'Keyword.rankend', 'Keyword.nocontract', 'Keyword.Penalty', 'Keyword.created', 'Keyword.updated',
            'User.id', 'User.company', 'User.name', 'User.loginip', 'User.logintime'
        ];
        
        $keywords = $this->Keyword->find('all', ['conditions' => $conds, 'fields' => $fields, 'order' => 'Keyword.updated DESC']);
        
        $this->set('keywords', $keywords);
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 *
 */
    public function view($id = null)
    {
        $this->loadModel('Engine');
        $engine_list = $this->Engine->find('all');
        
        $this->Keyword->id = $id;
        if (!$this->Keyword->exists()) {
            throw new NotFoundException(__('Invalid keyword'));
        }
        
        $this->set('keyword', $this->Keyword->read(null, $id));
        $this->set('engine_list', $engine_list);
        
        $fields = ['Rankhistory.ID', 'Rankhistory.Url', 'Rankhistory.Rank', 'Rankhistory.RankDate'];
        $conds = [];
        $conds['Rankhistory.KeyID'] = $id;
        $conds['Keyword.UserID'] = $this->Auth->user('user.id');
        
        //$this->paginate['Rankhistory'] = array('limit' => 30, 'conditions' => array('Rankhistory.KeyID'=>$id), 'fields' => $fields, 'order' => 'Rankhistory.ID DESC');
        //$data_rankhistories = $this->paginate('Rankhistory');
        $data_rankhistories = $this->Keyword->Rankhistory->find('all', ['limit' => 30, 'conditions' => $conds, 'fields' => $fields, 'order' => 'Rankhistory.ID DESC']);
        
        /*30日以内：5日区切り
        31日～60日以内：7日区切り
        61日～90日以内：10日区切り
        91日～120日以内：15日区切り
        120日～：20日区切り*/
        if ($this->request->is('post')) {
            if ($this->request->is('ajax')) {
                $rankDate = explode('-', $this->request->data['RankDate']);
                
                $beginDate = str_replace('/', '-', trim($rankDate[0]));
                $endDate = str_replace('/', '-', trim($rankDate[1]));
                $days = $this->dateDiff($beginDate, $endDate);
                
                if ($days <= 30) {
                    $conds['DATE_FORMAT(Rankhistory.RankDate,"%Y-%m-%d")'] = $this->forDate($beginDate, $endDate, 5);
                } elseif ($days>=31 && $days <=60) {
                    $conds['DATE_FORMAT(Rankhistory.RankDate,"%Y-%m-%d")'] = $this->forDate($beginDate, $endDate, 7);
                } elseif ($days>=61 && $days <=90) {
                    $conds['DATE_FORMAT(Rankhistory.RankDate,"%Y-%m-%d")'] = $this->forDate($beginDate, $endDate, 10);
                } elseif ($days>=91 && $days <=120) {
                    $conds['DATE_FORMAT(Rankhistory.RankDate,"%Y-%m-%d")'] = $this->forDate($beginDate, $endDate, 15);
                } elseif ($days >120) {
                    $conds['DATE_FORMAT(Rankhistory.RankDate,"%Y-%m-%d")'] = $this->forDate($beginDate, $endDate, 20);
                }
                    $conds['Rankhistory.RankDate BETWEEN ? AND ?'] = [str_replace('/', '', trim($rankDate[0])), str_replace('/', '', trim($rankDate[1]))];
                
                    $rankhistories = $this->Keyword->Rankhistory->find('all', ['conditions' => $conds, 'fields' => $fields, 'order' => 'Rankhistory.ID DESC']);
            } else {
                $rankhistories = $this->Keyword->Rankhistory->find('all', ['limit' => 10, 'conditions' => $conds, 'fields' => $fields, 'order' => 'Rankhistory.ID DESC']);
            
                $conds['DATE_FORMAT(Rankhistory.RankDate,"%Y-%m")'] = date('Y-m', strtotime($this->request->data['Rankhistory']['RankDate_list']['year'].'-'.$this->request->data['Rankhistory']['RankDate_list']['month']));
                $data_rankhistories = $this->Keyword->Rankhistory->find('all', ['conditions' => $conds, 'fields' => $fields, 'order' => 'Rankhistory.ID DESC']);
            }
            
            if ($this->request->is('ajax')) {
                foreach ($rankhistories as $key => $rankhistory) {
                    $rankhistories[$key]['Rankhistory']['RankDate'] = date('Y-m-d', strtotime($rankhistory['Rankhistory']['RankDate']));
                    
                    $ranks = explode('/', $rankhistory['Rankhistory']['Rank']);
                    $google_rank = $ranks[0];
                    $yahoo_rank = $ranks[1];
                    
                    if ($google_rank==0 && $yahoo_rank!=0) {
                        $rankhistories[$key]['Rankhistory']['google_rank'] = 100;
                        $rankhistories[$key]['Rankhistory']['yahoo_rank'] = $yahoo_rank;
                    } elseif ($yahoo_rank==0 && $google_rank!=0) {
                        $rankhistories[$key]['Rankhistory']['yahoo_rank'] = 100;
                        $rankhistories[$key]['Rankhistory']['google_rank'] = $google_rank;
                    } elseif ($google_rank == 0 && $yahoo_rank==0) {
                        $rankhistories[$key]['Rankhistory']['google_rank'] = 100;
                        $rankhistories[$key]['Rankhistory']['yahoo_rank'] = 100;
                    } else {
                        $rankhistories[$key]['Rankhistory']['google_rank'] = $google_rank;
                        $rankhistories[$key]['Rankhistory']['yahoo_rank'] = $yahoo_rank;
                    }
                }
                $this->autoRender = false;
                Configure::write('debug', 0);
                return json_encode($rankhistories);
            } else {
                $this->set(compact('rankhistories'));
            }
        } else {
            if (count($data_rankhistories)>0) {
                $rankhistories = array_slice($data_rankhistories, 0, 10);
            } else {
                $rankhistories = $this->Keyword->Rankhistory->find('all', ['limit' => 10, 'conditions' => $conds, 'fields' => $fields, 'order' => 'Rankhistory.ID DESC']);
            }
            
            if (count($rankhistories)==0) {
                throw new NotFoundException(__('Invalid keyword'));
            }
            $this->set(compact('rankhistories'));
        }
        
        $today_rank = 0;
        foreach ($rankhistories as $rankhistory) {
            if ($rankhistory['Rankhistory']['RankDate'] == date('Ymd') && $rankhistory['Rankhistory']['Rank'] != '') {
                $today_rank = 1;
            }
        }
        $this->set('today_rank', $today_rank);
        $this->set(compact('data_rankhistories'));
    }

/*------------------------------------------------------------------------------------------------------------
 * ranklog
 * 
 * @author lecaoquochung@gmail.com
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @created 20151118
 * @updated
 *-----------------------------------------------------------------------------------------------------------*/
    public function ranklog($id = null)
    {
        
        $this->loadModel('Engine');
        $engine_list = $this->Engine->find('all');
        
        $this->Keyword->id = $id;
        if (!$this->Keyword->exists()) {
            throw new NotFoundException(__('Invalid keyword'));
        }
        
        $this->set('keyword', $this->Keyword->read(null, $id));
        $this->set('engine_list', $engine_list);
        
        $fields = ['Ranklog.id', 'Ranklog.url', 'Ranklog.rank', 'Ranklog.rankdate'];
        $conds = [];
        $conds['Ranklog.keyword_id'] = $id;
        $conds['Keyword.UserID'] = $this->Auth->user('user.id');
        
        $data_rankhistories = $this->Keyword->Ranklog->find('all', ['limit' => 30, 'conditions' => $conds, 'fields' => $fields, 'order' => 'Ranklog.rankdate DESC']);
        
        if ($this->request->is('post')) {
            if ($this->request->is('ajax')) {
                // lower form
                $this->autoRender = false;
                Configure::write('debug', 0);
                
                $rankDate = explode('-', $this->request->data['RankDate']);
                $beginDate = str_replace('/', '-', trim($rankDate[0]));
                $endDate = str_replace('/', '-', trim($rankDate[1]));
                $days = $this->dateDiff($beginDate, $endDate);
                
                if ($days <= 30) {
                    $conds['DATE_FORMAT(Ranklog.rankdate,"%Y-%m-%d")'] = $this->forDate($beginDate, $endDate, 5);
                } elseif ($days>=31 && $days <=60) {
                    $conds['DATE_FORMAT(Ranklog.rankdate,"%Y-%m-%d")'] = $this->forDate($beginDate, $endDate, 7);
                } elseif ($days>=61 && $days <=90) {
                    $conds['DATE_FORMAT(Ranklog.rankdate,"%Y-%m-%d")'] = $this->forDate($beginDate, $endDate, 10);
                } elseif ($days>=91 && $days <=120) {
                    $conds['DATE_FORMAT(Ranklog.rankdate,"%Y-%m-%d")'] = $this->forDate($beginDate, $endDate, 15);
                } elseif ($days >120) {
                    $conds['DATE_FORMAT(Ranklog.rankdate,"%Y-%m-%d")'] = $this->forDate($beginDate, $endDate, 20);
                }
                $conds['Ranklog.rankdate BETWEEN ? AND ?'] = [str_replace('/', '', trim($rankDate[0])), str_replace('/', '', trim($rankDate[1]))];
                
                $rankhistories = $this->Keyword->Ranklog->find('all', ['conditions' => $conds, 'fields' => $fields, 'order' => 'Ranklog.rankdate DESC']);
                
                foreach ($rankhistories as $key => $rankhistory) {
                    $rank = json_decode($rankhistory['Ranklog']['rank'], true);
                    $rankhistories[$key]['Ranklog']['rankdate'] = $rankhistory['Ranklog']['rankdate'];
                    $google_rank = $rank['google_jp'];
                    $yahoo_rank = $rank['yahoo_jp'];
                    
                    if ($google_rank==0 && $yahoo_rank!=0) {
                        $rankhistories[$key]['Ranklog']['google_jp'] = 100;
                        $rankhistories[$key]['Ranklog']['yahoo_jp'] = $yahoo_rank;
                    } elseif ($yahoo_rank==0 && $google_rank!=0) {
                        $rankhistories[$key]['Ranklog']['yahoo_jp'] = 100;
                        $rankhistories[$key]['Ranklog']['google_jp'] = $google_rank;
                    } elseif ($google_rank == 0 && $yahoo_rank==0) {
                        $rankhistories[$key]['Ranklog']['google_jp'] = 100;
                        $rankhistories[$key]['Ranklog']['yahoo_jp'] = 100;
                    } else {
                        $rankhistories[$key]['Ranklog']['google_jp'] = $google_rank;
                        $rankhistories[$key]['Ranklog']['yahoo_jp'] = $yahoo_rank;
                    }
                }
             
                return json_encode($rankhistories);
                
            } else {
                // upper form
                $rankhistories = $this->Keyword->Ranklog->find('all', ['limit' => 10, 'conditions' => $conds, 'fields' => $fields, 'order' => 'Ranklog.id DESC']);
                $conds['DATE_FORMAT(Ranklog.rankdate,"%Y-%m")'] = $this->request->data['Ranklog']['RankDate_list']['year'].'-'.$this->request->data['Ranklog']['RankDate_list']['month'];
                $data_rankhistories = $this->Keyword->Ranklog->find('all', ['conditions' => $conds, 'fields' => $fields, 'order' => 'Ranklog.rankdate DESC']);
                $this->set(compact('rankhistories'));
            }
            
        } else {
            // default load
            if (count($data_rankhistories)>0) {
                $rankhistories = array_slice($data_rankhistories, 0, 10);
            } else {
                $rankhistories = $this->Keyword->Ranklog->find('all', ['limit' => 10, 'conditions' => $conds, 'fields' => $fields, 'order' => 'Ranklog.rankdate DESC']);
            }
            
            if (count($rankhistories)==0) {
                throw new NotFoundException(__('Invalid keyword'));
            }
            $this->set(compact('rankhistories'));
        }
        
        $today_rank = 0;
        foreach ($rankhistories as $rankhistory) {
            if ($rankhistory['Ranklog']['rankdate'] == date('Ymd') && $rankhistory['Ranklog']['rank'] != '') {
                $today_rank = 1;
            }
        }
        $this->set('today_rank', $today_rank);
        $this->set(compact('data_rankhistories'));
    }

/**
 * add method
 *
 * @return void
 */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->request->data['Keyword']['rankstart'] = implode('', $this->request->data['Keyword']['rankstart']);
            $this->request->data['Keyword']['Enabled'] = 1;
            
            $this->Keyword->create();
            if ($this->Keyword->save($this->request->data)) {
                $this->request->data['Rankhistory']['KeyID'] = $this->Keyword->id;
                $this->request->data['Rankhistory']['Url'] = $this->request->data['Keyword']['Url'];
                $this->request->data['Rankhistory']['RankDate'] = date('Ymd');
                
                if ($this->Keyword->Rankhistory->save($this->request->data)) {
                    $this->Session->setFlash(__('The keyword has been saved'));
                    $this->redirect($this->referer());
                } else {
                    $this->Session->setFlash(__('The keyword could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash(__('The keyword could not be saved. Please, try again.'));
            }
        }
        $users = $this->Keyword->User->find('list', ['fields' => ['User.company']]);
        $this->set(compact('users'));
    }

/**
 * extra method : extra keyword method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function extra($id = null)
    {
        $this->loadModel('Extra');
        $this->Keyword->recursive = 0;
        $this->Keyword->id = $id;
        if (!$this->Keyword->exists()) {
            throw new NotFoundException(__('Invalid keyword'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Keyword->save($this->request->data)) {
                $this->Session->setFlash(__('The keyword has been saved'));
                $this->redirect(['controller' => 'rankhistories', 'action' => 'index']);
            } else {
                $this->Session->setFlash(__('The keyword could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Keyword->read(null, $id);
        }
        $keywords = $this->Keyword->find('all', ['conditions' => ['Keyword.ID' => $id]]);
        $extras = $this->Keyword->Extra->find('all', ['conditions' => ['Extra.KeyID' => $id]]);
        $this->set(compact('keywords', 'extras'));
    }

/**
 * edit method : edit keyword method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null)
    {
        $this->Keyword->id = $id;
        $this->Keyword->Rankhistory->id = $this->Keyword->Rankhistory->find('first', ['conditions' => ['KeyID' => $this->Keyword->id, 'RankDate' => date('Ymd')]]);
        if (!$this->Keyword->exists()) {
            throw new NotFoundException(__('Invalid keyword'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
                
            if (isset($this->request->data['Keyword']['rankend'])) {
                $this->request->data['Keyword']['rankend'] = implode('', $this->request->data['Keyword']['rankend']);
            }
            $this->request->data['Rankhistory']['updated'] = date('Y-m-d H:i:s');
            
            if ($this->Keyword->save($this->request->data)) {
                $this->Keyword->Rankhistory->save($this->request->data);
                if (isset($this->request->data['Keyword']['kaiyaku_reason'])) {
                    $this->Session->setFlash(__('The keyword has been cancelled.'), 'default', ['class' => 'error']);
                    if ($this->request->data['Keyword']['rankend'] < date('Ymd')) {
                        $this->redirect(['controller'=>'keywords','action'=>'kaiyakulist']);
                    } else {
                        $this->redirect(['controller'=>'rankhistories','action'=>'index']);
                    }
                } else {
                    $this->Session->setFlash(__('The keyword has been saved'), 'default', ['class' => 'success']);
                    $this->redirect(['controller' => 'keywords', 'action' => 'edit',$this->Keyword->id]);
                }
            } else {
                $this->Session->setFlash(__('The keyword could not be saved. Please, try again.'), 'default', ['class' => 'error']);
            }
        } else {
            $this->request->data = $this->Keyword->read(null, $id);
        }
        $users = $this->Keyword->User->find('list');
        $this->set(compact('users'));
    }
    
/**
 * cancel method : cancel keyword method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function cancel($id = null)
    {
        $this->Keyword->id = $id;
        if (!$this->Keyword->exists()) {
            throw new NotFoundException(__('Invalid keyword'));
        }
        
        if ($this->request->is('post') || $this->request->is('put')) {
                $this->request->data['Keyword']['rankend'] = implode('', $this->request->data['Keyword']['rankend']);
                $this->request->data['Keyword']['nocontract'] = 1;
            if ($this->Keyword->save($this->request->data)) {
                $this->Session->setFlash(__('The keyword has been cancelled'));
                $this->redirect(['controller' => 'rankhistories', 'action' => 'index']);
            } else {
                $this->Session->setFlash(__('The keyword could not be cancelled. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Keyword->read(null, $id);
        }
    }
    
/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null)
    {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Keyword->id = $id;
        if (!$this->Keyword->exists()) {
            throw new NotFoundException(__('Invalid keyword'));
        }
        if ($this->Keyword->delete()) {
            $this->Session->setFlash(__('Keyword deleted'));
            $this->redirect(['action' => 'index']);
        }
        $this->Session->setFlash(__('Keyword was not deleted'));
        $this->redirect(['action' => 'index']);
    }
        
/**
 * enabled method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function enabled($id = null, $enabled)
    {
        $this->Keyword->id = $id;
        if (!$this->Keyword->exists()) {
            throw new NotFoundException(__('Invalid keyword'));
        }
        if ($this->Keyword->saveField('Enabled', $enabled)) {
            $this->Session->setFlash(__('Keyword '.($enabled==1?'enabled':'diabled')));
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__('Keyword was not '.($enabled==1?'enabled':'diabled')));
        $this->redirect($this->referer());
    }

/**
 * set all keyword enddate method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function set_all_keyword_enddate()
    {
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Keyword->updateAll(
                [
                    'Keyword.rankend'=>implode('', $this->request->data['Keyword']['rankend']),
                    'Keyword.kaiyaku_reason'=>implode('', $this->request->data['Keyword']['kaiyaku_reason']),
                    'Keyword.updated'=>"'".date('Y-m-d H:i:s')."'"
                ],
                [
                    'Keyword.UserID'=>$this->request->data['Keyword']['UserID'],
                    'Keyword.nocontract'=>$this->request->data['Keyword']['nocontract'],
                    'Keyword.rankend'=>0
                ]
            )) {
                $this->Session->setFlash(__('The keyword has been kaiyaku'), 'default', ['class' => 'success']);
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The keyword could not be kaiyaku. Please, try again.'), 'default', ['class' => 'error']);
            }
        }
    }
    
/**
 * Set nocontract method ajax
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function nocontract($id = null, $nocontract)
    {
        $this->Keyword->id = $id;
        if (!$this->Keyword->exists()) {
            throw new NotFoundException(__('Invalid keyword'));
        }
        if ($this->Keyword->saveField('nocontract', $nocontract)) {
            $this->Session->setFlash(__('Keyword was set to '.($nocontract==1?'Nocontract':'Contract')));
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__('Keyword was set to'.($nocontract==1?'Nocontract':'Contract')));
        $this->redirect($this->referer());
    }

/**
 * load rank method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function load_rank($nocontract = 0)
    {
        $this->autoRender = false;
        Configure::write('debug', 0);
        set_time_limit(0);
        $this->Keyword->recursive = -1;
        
        $conds = [];
        $conds['Keyword.Enabled'] = 1;
        $conds['Keyword.rankend'] = 0;
        $conds['Keyword.ID'] = $this->request->data['keyID'];
        $conds['Keyword.nocontract'] = $nocontract;
        
        $keyword = $this->Keyword->find('first', ['conditions' => $conds]);
        
        if ($keyword != false) {
            if ($keyword['Keyword']['Strict'] == 1) {
                $domain = $this->Rank->remainUrl($keyword['Keyword']['Url']);
            } else {
                $domain = $this->Rank->remainDomain($keyword['Keyword']['Url']);
            }
        }
        
        $engine = $keyword['Keyword']['Engine'];
        if ($engine == 3) {
                $rank = $this->Rank->keyWordRank('google_jp', $domain, $keyword['Keyword']['Keyword']) . '/' . $this->Rank->keyWordRank('yahoo_jp', $domain, $keyword['Keyword']['Keyword']);
        } elseif ($engine == 6) {
                $rank = $this->Rank->keyWordRank('google_en', $domain, $keyword['Keyword']['Keyword']) . '/' . $this->Rank->keyWordRank('yahoo_en', $domain, $keyword['Keyword']['Keyword']);
        } elseif ($engine == 7) {//mobile search engine
                $rank = $this->RankMobile->keywordRankYahooMobile($domain, $keyword['Keyword']['Keyword']);
        } elseif ($engine == 8) {
                $rank = $this->RankMobile->keywordRankGoogleMobile($domain, $keyword['Keyword']['Keyword']);
        } else {//end
                $engine_list = $this->Rank->getEngineList();
                $rank = $this->Rank->keyWordRank($engine_list[$engine]['Name'], $domain, $keyword['Keyword']['Keyword']);
        }

        //delete Rankhistory current date
        $this->Keyword->Rankhistory->deleteAll(['Rankhistory.KeyID' => $keyword['Keyword']['ID'], 'Rankhistory.RankDate' => date('Ymd')]);
        //Insert Rankhistory current date
        $rankhistory['Rankhistory']['KeyID'] = $keyword['Keyword']['ID'];
        $rankhistory['Rankhistory']['Url'] = $domain;
        $rankhistory['Rankhistory']['Rank'] = $rank;
        $rankhistory['Rankhistory']['RankDate'] = date('Ymd');
        //check color and arrow
        $check_params = [];
        $rankDate = date('Ymd', strtotime(date('Y-m-d') . '-1 day'));
        $data_rankhistory = Cache::read($keyword['Keyword']['ID'] . '_' . $rankDate, 'Rankhistory');
        if (!$data_rankhistory) {
                $data_rankhistory = $this->Keyword->Rankhistory->find('first', [
                    'fields' => ['Rankhistory.Rank'],
                    'conditions' => [
                        'Rankhistory.KeyID' => $keyword['Keyword']['ID'],
                        'Rankhistory.RankDate' => $rankDate
                    ]]);
                Cache::write($keyword['Keyword']['ID'] . '_' . $rankDate, $rankhistory, 'Rankhistory');
        }
        if (isset($data_rankhistory['Rankhistory']['Rank']) && strpos($data_rankhistory['Rankhistory']['Rank'], '/')) {
            $rank_old = explode('/', $data_rankhistory['Rankhistory']['Rank']);
        } else {
            $rank_old[0] = 0;
            $rank_old[1] = 0;
        }

        if (!empty($rank) && strpos($rank, '/')) {
            $rank_new = explode('/', $rank);
        } else {
            $rank_new[0] = 0;
            $rank_new[1] = 0;
        }

        //color
        if ($rank_new[0] >= 1 && $rank_new[0] <= 10 || $rank_new[1] >= 1 && $rank_new[1] <= 10) {
            $check_params['color'] = '#E4EDF9';
        } elseif ($rank_new[0] >= 11 && $rank_new[0] <= 20 || $rank_new[1] >= 11 && $rank_new[1] <= 20) {
            $check_params['color'] = '#FAFAD2';
        } elseif ($rank_old[0] >= 1 && $rank_old[0] <= 10 && $rank_new[0] > 10 || $rank_old[1] >= 1 && $rank_old[1] <= 10 && $rank_new[1] > 10) {
            $check_params['color'] = '#FFBFBF';
        } else {
            $check_params['color'] = '';
        }

        //arrow
        if ($rank_new[0] > $rank_old[0] || $rank_new[1] > $rank_old[1] || $rank_new[0] == 0 && $rank_old[0] !=0 || $rank_new[1] == 0 && $rank_old[1] !=0) {
            $check_params['arrow'] = '<span class="red-arrow">↓</span>';
        } elseif ($rank_new[0] < $rank_old[0] || $rank_new[1] < $rank_old[1]) {
            $check_params['arrow'] = '<span class="blue-arrow">↑</span>';
        } else {
            $check_params['arrow'] = '';
        }
        
        $rankhistory['Rankhistory']['params'] = json_encode($check_params);
        $this->Keyword->Rankhistory->create();
        $this->Keyword->Rankhistory->save($rankhistory);

        $duration = $this->Keyword->Duration->find('first', [
            'fields' => ['Duration.StartDate'],
            'conditions' => [
                'Duration.KeyID' => $keyword['Keyword']['ID'],
                'Duration.Flag' => 2
            ],
            'order' => 'Duration.ID'
        ]);

        if ($duration == false) {
            if (strpos($rank, '/') !== false) {
                $ranks = explode('/', $rank);
                $google_rank = $ranks[0];
                $yahoo_rank = $ranks[1];
            }

            if (($google_rank > 0 && $google_rank <= 10) || ($yahoo_rank > 0 && $yahoo_rank <= 10) || ($rank > 0 && $rank <= 10)) {
                $durations['Duration']['KeyID'] = $keyword['Keyword']['ID'];
                $durations['Duration']['StartDate'] = date('Ymd');
                $durations['Duration']['EndDate'] = 0;
                $durations['Duration']['Flag'] = 2;
                $this->Keyword->Duration->create();
                $this->Keyword->Duration->save($durations);
            }
        }
    }

/**
 * load rank one method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function load_rank_one()
    {
        $this->autoRender = false;
        Configure::write('debug', 0);
        set_time_limit(0);
        $this->Keyword->recursive = -1;
        
        $keyword = $this->Keyword->find('first', ['conditions' => ['Keyword.Enabled' => 1, 'Keyword.ID' => $this->request->data['keyID']]]);
        
        #sleep(2);
        if ($keyword != false) {
            if ($keyword['Keyword']['Strict'] == 1) {
                    $domain = $this->Rank->remainUrl($keyword['Keyword']['Url']);
            } else {
                    $domain = $this->Rank->remainDomain($keyword['Keyword']['Url']);
            }
        }
        
        $engine = $keyword['Keyword']['Engine'];
        
        if ($engine == 3) {
                $rank = $this->Rank->keyWordRank('google_jp', $domain, $keyword['Keyword']['Keyword']) . '/' . $this->Rank->keyWordRank('yahoo_jp', $domain, $keyword['Keyword']['Keyword']);
        } elseif ($engine == 6) {
                $rank = $this->Rank->keyWordRank('google_en', $domain, $keyword['Keyword']['Keyword']) . '/' . $this->Rank->keyWordRank('yahoo_en', $domain, $keyword['Keyword']['Keyword']);
        } elseif ($engine == 7) {//mobile search engine
                $rank = $this->RankMobile->keywordRankYahooMobile($domain, $keyword['Keyword']['Keyword']);
        } elseif ($engine == 8) {
                $rank = $this->RankMobile->keywordRankGoogleMobile($domain, $keyword['Keyword']['Keyword']);
        } else {//end
                $engine_list = Configure::read('ENGINES');
                $rank = $this->Rank->keyWordRank($engine_list[$engine]['Name'], $domain, $keyword['Keyword']['Keyword']);
        }
        
        //delete Rankhistory current date
        $this->Keyword->Rankhistory->deleteAll(['Rankhistory.KeyID' => $keyword['Keyword']['ID'], 'Rankhistory.RankDate' => date('Ymd')]);
       
        //Insert Rankhistory current date
        $rankhistory['Rankhistory']['KeyID'] = $keyword['Keyword']['ID'];
        $rankhistory['Rankhistory']['Url'] = $domain;
        $rankhistory['Rankhistory']['Rank'] = $rank;
        $rankhistory['Rankhistory']['RankDate'] = date('Ymd');
       
        //check color and arrow
        $check_params = [];
        $rankDate = date('Ymd', strtotime(date('Y-m-d') . '-1 day'));
        $data_rankhistory = Cache::read($keyword['Keyword']['ID'] . '_' . $rankDate, 'Rankhistory');
        
        if (!$data_rankhistory) {
            $data_rankhistory = $this->Keyword->Rankhistory->find('first', [
                'fields' => ['Rankhistory.Rank'],
                'conditions' => [
                    'Rankhistory.KeyID' => $keyword['Keyword']['ID'],
                    'Rankhistory.RankDate' => $rankDate
                ]]);
            Cache::write($keyword['Keyword']['ID'] . '_' . $rankDate, $rankhistory, 'Rankhistory');
        }
        
        if (isset($data_rankhistory['Rankhistory']['Rank']) && strpos($data_rankhistory['Rankhistory']['Rank'], '/')) {
            $rank_old = explode('/', $data_rankhistory['Rankhistory']['Rank']);
        } else {
            $rank_old[0] = 0;
            $rank_old[1] = 0;
        }
        
        if (!empty($rank) && strpos($rank, '/')) {
            $rank_new = explode('/', $rank);
        } else {
            $rank_new[0] = 0;
            $rank_new[1] = 0;
        }
        
        //color
        if ($rank_new[0] >= 1 && $rank_new[0] <= 10 || $rank_new[1] >= 1 && $rank_new[1] <= 10) {
            $check_params['color'] = '#E4EDF9';
        } elseif ($rank_new[0] >= 11 && $rank_new[0] <= 20 || $rank_new[1] >= 11 && $rank_new[1] <= 20) {
            $check_params['color'] = '#FAFAD2';
        } elseif ($rank_old[0] >= 1 && $rank_old[0] <= 10 && $rank_new[0] > 10 || $rank_old[1] >= 1 && $rank_old[1] <= 10 && $rank_new[1] > 10) {
            $check_params['color'] = '#FFBFBF';
        } else {
            $check_params['color'] = '';
        }
        
        //arrow
        if ($rank_new[0] > $rank_old[0] || $rank_new[1] > $rank_old[1] || $rank_new[0] == 0 && $rank_old[0] !=0 || $rank_new[1] == 0 && $rank_old[1] !=0) {
            $check_params['arrow'] = '<span class="red-arrow">↓</span>';
        } elseif ($rank_new[0] < $rank_old[0] || $rank_new[1] < $rank_old[1]) {
            $check_params['arrow'] = '<span class="blue-arrow">↑</span>';
        } else {
            $check_params['arrow'] = '';
        }
        
        $rankhistory['Rankhistory']['params'] = json_encode($check_params);
        $this->Keyword->Rankhistory->create();
        $this->Keyword->Rankhistory->save($rankhistory);
        
        $duration = $this->Keyword->Duration->find('first', [
            'fields' => ['Duration.StartDate'],
            'conditions' => [
                'Duration.KeyID' => $keyword['Keyword']['ID'],
                'Duration.Flag' => 2
            ],
            'order' => 'Duration.ID'
        ]);
        
        if ($duration == false) {
            if (strpos($rank, '/') !== false) {
                $ranks = explode('/', $rank);
                $google_rank = $ranks[0];
                $yahoo_rank = $ranks[1];
            }
            
            if (($google_rank > 0 && $google_rank <= 10) || ($yahoo_rank > 0 && $yahoo_rank <= 10) || ($rank > 0 && $rank <= 10)) {
                $durations['Duration']['KeyID'] = $keyword['Keyword']['ID'];
                $durations['Duration']['StartDate'] = date('Ymd');
                $durations['Duration']['EndDate'] = 0;
                $durations['Duration']['Flag'] = 2;
                $this->Keyword->Duration->create();
                $this->Keyword->Duration->save($durations);
            }
            #sleep(1);
        }
    }


/**
 * load all rank method
 * Field: 'Keyword.Enabled', 'Keyword.nocontract', 'Keyword.rankend', 'Keyword.Strict', 'Keyword.Url', 'Keyword.Engine'
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function load_all_rank()
    {
        $message = [];
        set_time_limit(0);
        $this->Keyword->recursive = -1;
        
        // Filter keyword
        $conds = [];
        $conds['Keyword.Enabled'] = 1;
        $conds['Keyword.nocontract'] = 0;
        $conds['Keyword.rankend'] = 0;
        
        $keywords = $this->Keyword->find('all', ['conditions' => $conds]);
        
        foreach ($keywords as $keyword) {
            sleep(2);
            if ($keyword != false) {
                if ($keyword['Keyword']['Strict'] == 1) {
                    $domain = $this->Rank->remainUrl($keyword['Keyword']['Url']);
                } else {
                    $domain = $this->Rank->remainDomain($keyword['Keyword']['Url']);
                }
            }
            
            $engine = $keyword['Keyword']['Engine'];
            
            if ($engine == 3) {
                $rank = $this->Rank->keyWordRank('google_jp', $domain, $keyword['Keyword']['Keyword']) . '/' . $this->Rank->keyWordRank('yahoo_jp', $domain, $keyword['Keyword']['Keyword']);
            } elseif ($engine == 6) {
                $rank = $this->Rank->keyWordRank('google_en', $domain, $keyword['Keyword']['Keyword']) . '/' . $this->Rank->keyWordRank('yahoo_en', $domain, $keyword['Keyword']['Keyword']);
            } elseif ($engine == 7) {//mobile search engine
                $rank = $this->RankMobile->keywordRankYahooMobile($domain, $keyword['Keyword']['Keyword']);
            } elseif ($engine == 8) {
                $rank = $this->RankMobile->keywordRankGoogleMobile($domain, $keyword['Keyword']['Keyword']);
            } else {//end
                $engine_list = $this->Rank->getEngineList();
                $rank = $this->Rank->keyWordRank($engine_list[$engine]['Name'], $domain, $keyword['Keyword']['Keyword']);
            }
            
            //delete Rankhistory current date
            $this->Keyword->Rankhistory->deleteAll(['Rankhistory.KeyID' => $keyword['Keyword']['ID'], 'Rankhistory.RankDate' => date('Ymd')]);
           
            //Insert Rankhistory current date
            $rankhistory['Rankhistory']['KeyID'] = $keyword['Keyword']['ID'];
            $rankhistory['Rankhistory']['Url'] = $domain;
            $rankhistory['Rankhistory']['Rank'] = $rank;
            $rankhistory['Rankhistory']['RankDate'] = date('Ymd');
            
            //check color and arrow
            $check_params = [];
            $rankDate = date('Ymd', strtotime(date('Y-m-d') . '-1 day'));
            $data_rankhistory = Cache::read($keyword['Keyword']['ID'] . '_' . $rankDate, 'Rankhistory');
            
            // No cache
            if (!$data_rankhistory) {
                $data_rankhistory = $this->Keyword->Rankhistory->find('first', [
                    'fields' => ['Rankhistory.Rank'],
                    'conditions' => [
                        'Rankhistory.KeyID' => $keyword['Keyword']['ID'],
                        'Rankhistory.RankDate' => $rankDate
                    ]]);
                Cache::write($keyword['Keyword']['ID'] . '_' . $rankDate, $rankhistory, 'Rankhistory');
            }
            
            // Already cache
            if (isset($data_rankhistory['Rankhistory']['Rank']) && strpos($data_rankhistory['Rankhistory']['Rank'], '/')) {
                $rank_old = explode('/', $data_rankhistory['Rankhistory']['Rank']);
            } else {
                $rank_old[0] = 0;
                $rank_old[1] = 0;
            }
            
            // Check rank is not empty and has a slash
            if (!empty($rank) && strpos($rank, '/')) {
                $rank_new = explode('/', $rank);
            } else {
                $rank_new[0] = 0;
                $rank_new[1] = 0;
            }
            
            //color
            if ($rank_new[0] >= 1 && $rank_new[0] <= 10 || $rank_new[1] >= 1 && $rank_new[1] <= 10) {
                $check_params['color'] = '#E4EDF9';
            } elseif ($rank_new[0] >= 11 && $rank_new[0] <= 20 || $rank_new[1] >= 11 && $rank_new[1] <= 20) {
                $check_params['color'] = '#FAFAD2';
            } elseif ($rank_old[0] >= 1 && $rank_old[0] <= 10 && $rank_new[0] > 10 || $rank_old[1] >= 1 && $rank_old[1] <= 10 && $rank_new[1] > 10) {
                $check_params['color'] = '#FFBFBF';
            } else {
                $check_params['color'] = '';
            }
            
            //arrow
            if ($rank_new[0] > $rank_old[0] || $rank_new[1] > $rank_old[1]) {
                $check_params['arrow'] = '<span class="red-arrow">↓</span>';
            } elseif ($rank_new[0] < $rank_old[0] || $rank_new[1] < $rank_old[1]) {
                $check_params['arrow'] = '<span class="blue-arrow">↑</span>';
            } else {
                $check_params['arrow'] = '';
            }
            
            $rankhistory['Rankhistory']['params'] = json_encode($check_params);
            
            $this->Keyword->Rankhistory->create();
            $this->Keyword->Rankhistory->save($rankhistory);
            
            // Old code rewrite
            $duration = $this->Keyword->Duration->find('first', [
                'fields' => ['Duration.StartDate'],
                'conditions' => [
                    'Duration.KeyID' => $keyword['Keyword']['ID'],
                    'Duration.Flag' => 2
                ],
                'order' => 'Duration.ID'
            ]);
            
           //
            if ($duration == false) {
                if (strpos($rank, '/') !== false) {
                    $ranks = explode('/', $rank);
                    $google_rank = $ranks[0];
                    $yahoo_rank = $ranks[1];
                }
                
                if (($google_rank > 0 && $google_rank <= 10) || ($yahoo_rank > 0 && $yahoo_rank <= 10) || ($rank > 0 && $rank <= 10)) {
                    $durations['Duration']['KeyID'] = $keyword['Keyword']['ID'];
                    $durations['Duration']['StartDate'] = date('Ymd');
                    $durations['Duration']['EndDate'] = 0;
                    $durations['Duration']['Flag'] = 2;
                    $this->Keyword->Duration->create();
                    $this->Keyword->Duration->save($durations);
                }
                sleep(1);
            }
        }
        echo implode(', ', $message);
                $this->redirect($this->referer());
    }
   
    
/*AJAX*/
    public function count_client_keyword()
    {
        Configure::write('debug', 0);
        $this->autoRender = false;
        $conds = [];
        
        $conds['Keyword.Enabled'] = 1;
        $conds['Keyword.nocontract'] = 0;
        $conds['Keyword.rankend'] = 0;
        $conds['Keyword.UserID'] = $this->Session->read('Auth.User.user.id');
        
        $count = $this->Keyword->find('count', ['conditions' => $conds]);
        $message = [];
        $message['count'] = $count;
        return json_encode($message);
    }
}
