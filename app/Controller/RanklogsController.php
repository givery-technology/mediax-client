<?php
App::uses('AppController', 'Controller');
/**
 * Ranklogs Controller
 *
 * @property Ranklog $Ranklog
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class RanklogsController extends AppController
{

/**
 * Components
 *
 * @var array
 */
    public $components = ['Paginator', 'Flash', 'Session'];

/*------------------------------------------------------------------------------------------------------------
 * index
 * 
 * @author lecaoquochung@gmail.com
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @created 20151116
 * @updated
 *-----------------------------------------------------------------------------------------------------------*/
    public function index($show_all = 'false', $status = 0)
    {
        $conds = [];
        $conds['Ranklog.rankdate >='] = date('Y-m-d');
        $conds['Keyword.Enabled'] = 1;
        $conds['Keyword.nocontract'] = 0;
        $conds['Keyword.UserID'] = $this -> Auth -> user('user.id');
        
        if ($this -> request -> is('post')) {
            if (!empty($this -> request -> data['Search']['query'])) {
                $conds['OR']['Ranklog.url LIKE'] = '%' . mb_strtolower(trim($this -> request -> data['Search']['query']), 'UTF-8') . '%';
                $conds['OR']['Keyword.Keyword LIKE'] = '%' . mb_strtolower(trim($this -> request -> data['Search']['query']), 'UTF-8') . '%';
                $conds['OR']['Keyword.url LIKE'] = '%' . mb_strtolower(trim($this -> request -> data['Search']['query']), 'UTF-8') . '%';
            }
        }
        
        $this -> Ranklog -> recursive = 0;
        $fields = [
            'Ranklog.id', 'Ranklog.url', 'Ranklog.rank', 'Ranklog.rankdate', 'Ranklog.params',
            'Keyword.ID', 'Keyword.UserID', 'Keyword.Keyword', 'Keyword.Engine', 'Keyword.rankend', 'Keyword.Enabled', 'Keyword.nocontract', 'Keyword.Penalty', 'Keyword.Url'
        ];
        $this -> set('ranklogs', $this -> Ranklog -> find('all', ['conditions' => $conds, 'fields' => $fields, 'order' => 'Keyword.ID DESC']));
        $this -> set('user', $this -> Ranklog -> Keyword -> User -> find('list', ['fields' => ['User.id', 'User.company']]));
        $this -> set('agent', $this -> Ranklog -> Keyword -> User -> find('list', ['fields' => ['User.id', 'User.agent']]));
        
        $this->loadModel('Notice');
        $conds_notice = [];
        $conds_notice['Notice.history <='] = date('Y-m-d');
        $notices = $this -> Notice -> find('all', ['conditions' => $conds_notice, 'order' => 'Notice.created DESC', 'limit' => Configure::read('NOTICE_NUMBER')]);
        $search = 1;
        $this->set('notices', $notices);
        $this->set('search', $search);
    }

/*------------------------------------------------------------------------------------------------------------
 * keyword
 * 
 * @author lecaoquochung@gmail.com
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @created 20151117
 * @updated
 *-----------------------------------------------------------------------------------------------------------*/
    public function keyword()
    {
        $conds = [];
        $conds['Keyword.Enabled'] = 1;
        $conds['Keyword.nocontract'] = 0;
        $conds['Keyword.UserID'] = $this -> Auth -> user('user.id');
        $conds['OR'] = [ ['Keyword.rankend' => 0], ['Keyword.rankend >=' => date('Ymd')]];
        
        $this -> Ranklog -> Keyword -> recursive = -1;
        $this -> Ranklog -> Keyword -> Behaviors -> load('Containable');
        $ranklogs = $this -> Ranklog -> Keyword -> find('all', [
            'conditions' => $conds,
            'fields' => [
                'Keyword.ID', 'Keyword.UserID', 'Keyword.Keyword', 'Keyword.Engine', 'Keyword.rankend', 'Keyword.Enabled', 'Keyword.nocontract', 'Keyword.Penalty', 'Keyword.Url'
            ],
            'contain' => [
                'Ranklog' => ['fields' => [
                    'Ranklog.id', 'Ranklog.keyword', 'Ranklog.url', 'Ranklog.rank', 'Ranklog.rankdate', 'Ranklog.params'
                ],
                'conditions' => ['Ranklog.rankdate' => date('Y-m-d')],
                'order' => 'Ranklog.id DESC'], 'Duration', 'Extra'
            ],
            'order' => 'Keyword.ID DESC'
        ]);
        $this -> set('ranklogs', $ranklogs);
    }

/*------------------------------------------------------------------------------------------------------------
 * downloadCsv
 * 
 * @author lecaoquochung@gmail.com
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @created 20151117
 * @updated
 *-----------------------------------------------------------------------------------------------------------*/
    public function downloadCsv($keyID = null, $date = null)
    {
        $this -> Ranklog -> Keyword -> recursive = 2;
        $fields = [];
        $fields = ['Keyword.ID', 'Keyword.Keyword', 'Keyword.Url', 'User.company'];
        $keyword = $this -> Ranklog -> Keyword -> find('first', ['conditions' => ['Keyword.ID' => $keyID], 'fields' => $fields]);

        $limit = 30;
        $conds = [];
        $conds['Ranklog.keyword_id'] = $keyID;
        if (!empty($date)) {
            $conds['DATE_FORMAT(Ranklog.rankdate,"%Y-%m")'] = date('Y-m', strtotime($date));
            $limit = null;
        }

        $this -> export([
            'conditions' => $conds,
            'fields' => ['Ranklog.rankdate', 'Ranklog.rank'],
            'order' => ['Ranklog.rankdate' => 'desc'],
            'limit' => $limit,
            'mapHeader' => 'RANKLOG_KEYWORD',
            'insertHeader' => [$keyword['Keyword']['Keyword'], $keyword['User']['company'], $keyword['Keyword']['Url']],
            'filename' => $keyword['Keyword']['Keyword'],
            'callbackHeader' => 'header_csv_by_keyword',
            'callbackRow' => 'row_csv_by_keyword',
        ]);
    }
}
