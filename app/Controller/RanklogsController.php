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
class RanklogsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/*------------------------------------------------------------------------------------------------------------
 * index
 * 
 * @author lecaoquochung@gmail.com
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @created 20151116
 * @updated
 *-----------------------------------------------------------------------------------------------------------*/	
	public function index($show_all = 'false', $status = 0) {
		$conds = array();
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
		$fields = array(
			'Ranklog.id', 'Ranklog.url', 'Ranklog.rank', 'Ranklog.rankdate', 'Ranklog.params', 
			'Keyword.ID', 'Keyword.UserID', 'Keyword.Keyword', 'Keyword.Engine', 'Keyword.rankend', 'Keyword.Enabled', 'Keyword.nocontract', 'Keyword.Penalty', 'Keyword.Url'
		);
		$this -> set('ranklogs', $this -> Ranklog -> find('all', array('conditions' => $conds, 'fields' => $fields, 'order' => 'Ranklog.modified DESC')));
		$this -> set('user', $this -> Ranklog -> Keyword -> User -> find('list', array('fields' => array('User.id', 'User.company'))));
		$this -> set('agent', $this -> Ranklog -> Keyword -> User -> find('list', array('fields' => array('User.id', 'User.agent'))));
		
		$this->loadModel('Notice');
		$conds_notice = array();
		$conds_notice['Notice.history <='] = date('Y-m-d');
		$notices = $this -> Notice -> find('all', array('conditions' => $conds_notice, 'order' => 'Notice.created DESC', 'limit' => Configure::read('NOTICE_NUMBER')));
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
	public function keyword() {
		$conds = array();
		$conds['Keyword.Enabled'] = 1;
		$conds['Keyword.nocontract'] = 0;
		$conds['Keyword.UserID'] = $this -> Auth -> user('user.id');
		$conds['OR'] = array( array('Keyword.rankend' => 0), array('Keyword.rankend >=' => date('Ymd')));
		
		$this -> Ranklog -> Keyword -> recursive = -1;
		$this -> Ranklog -> Keyword -> Behaviors -> load('Containable');
		$ranklogs = $this -> Ranklog -> Keyword -> find('all', array(
			'conditions' => $conds, 
			'fields' => array(
				'Keyword.ID', 'Keyword.UserID', 'Keyword.Keyword', 'Keyword.Engine', 'Keyword.rankend', 'Keyword.Enabled', 'Keyword.nocontract', 'Keyword.Penalty', 'Keyword.Url'
			), 
			'contain' => array(
				'Ranklog' => array('fields' => array(
					'Ranklog.id', 'Ranklog.keyword', 'Ranklog.url', 'Ranklog.rank', 'Ranklog.rankdate', 'Ranklog.params'
				), 
				'conditions' => array('Ranklog.rankdate' => date('Y-m-d')), 
			'order' => 'Ranklog.id DESC'), 'Duration', 'Extra'
			),
			'order' => 'Keyword.ID DESC'
		));
		$this -> set('ranklogs', $ranklogs);
	}

}
