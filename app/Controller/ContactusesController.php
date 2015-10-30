<?php
App::uses('CakeEmail', 'Network/Email');
App::uses('AppController', 'Controller');
/**
 * Contactuses Controller
 *
 * @property Contactus $Contactus
 */
class ContactusesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Contactus->recursive = 0;
		$this->set('contactuses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Contactus->id = $id;
		if (!$this->Contactus->exists()) {
			throw new NotFoundException(__('Invalid contactus'));
		}
		$this->set('contactus', $this->Contactus->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
		    $this->loadModel('User');
            $this->User->recursive = -1;
            $conds = array();
            $conds['User.id'] = $this->Auth->user('user.id');
            $fields= array();
            $fields = array('User.email');  
            $agent_email = $this->User->find('first', array('conditions' => $conds, 'fields' => $fields));
			$this->request->data['Contactus']['userid'] = $this->Auth->user('user.id');
			$this->request->data['Contactus']['date'] = date('Ymd');
			$this->Contactus->create();			
			if ($this->Contactus->save($this->request->data)) {
			
				// send mail
                $email = new CakeEmail('default');
                $email->from(array($agent_email['User']['email'] => $this->request->data['Contactus']['company']));
                $email->to(array('sem@givery.co.jp'))
                        ->subject($this->request->data['Contactus']['subject'])
                        ->template('agent_contactus')
                        ->viewVars(array('contactus' => $this->request->data));
                $email->send();
                
                // auto reply
                $email_reply = new CakeEmail('default');
                $email->from(array('sem@givery.co.jp' => '株式会社ギブリー'));
                $email_reply->to(array($agent_email['User']['email']))
                        ->subject($this->request->data['Contactus']['subject'])
                        ->template('agent_autoreply')
                        ->viewVars(array('contactus' => $this->request->data));
                $email_reply->send();
                
                $this->Session->setFlash(__('The contactus has been saved'), 'default', array('class' => 'success'));
			} else {
                $this->Session->setFlash(__('The contactus could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$this->redirect($this->referer());
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Contactus->id = $id;
		if (!$this->Contactus->exists()) {
			throw new NotFoundException(__('Invalid contactus'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Contactus->save($this->request->data)) {
				$this->Session->setFlash(__('The contactus has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contactus could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Contactus->read(null, $id);
		}
		$users = $this->Contactus->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Contactus->id = $id;
		if (!$this->Contactus->exists()) {
			throw new NotFoundException(__('Invalid contactus'));
		}
		if ($this->Contactus->delete()) {
			$this->Session->setFlash(__('Contactus deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Contactus was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
