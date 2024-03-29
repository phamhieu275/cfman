<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
/**
 * login method
 *
 * @return void
 */
	public function login() {
		$this->layout = 'login';
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash(__('Invalid username or password.'), 'default', array('class' => 'alert alert-error'), 'auth');
				$this->redirect($this->Auth->loginAction);
			}
		}
	}
	
/**
 * logout method
 *
 * @return void
 */	
	public function logout(){
		$this->redirect($this->Auth->logout());
	}
	
/**
 * dashboard method
 *
 * @return void
 */	
	public function dashboard() {
		
	}
	
/**
 * login method
 *
 * @return void
 */
	public function admin_login() {
		$this->layout = 'login';
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash(__('Invalid username or password.'), 'default', array('class' => 'alert alert-error'), 'auth');
				$this->redirect($this->Auth->loginAction);
			}
		}
	}
	
/**
 * logout method
 *
 * @return void
 */	
	public function admin_logout(){
		$this->redirect($this->Auth->logout());
	}
/**
 * dashboard method
 *
 * @return void
 */	
	public function admin_dashboard() {
		
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->paginate = array('User'=> array(
			'paramType'=> 'querystring',
			'limit'=> ROWS_PER_PAGE,
			'order'=> 'User.created DESC'
		));
		
		//don't display user of admin group.
		$conditions = array('User.group !='=> 1, 'User.delete_flag'=> STATUS_DISABLE);
		foreach($this->params['url'] as $key=> $value){
			if(empty($value)){
				continue;
			}
			switch($key){
				case 'username':
					$conditions['User.username LIKE'] = '%'.$value.'%';
					break;
				case 'group':
					$conditions['User.'.$key] = $value;
					break;
			}
		}
		$users = $this->paginate('User', $conditions);
		$this->set(compact('users'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			$this->request->data['User']['delete_flag'] = STATUS_DISABLE;
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'), 'default', array('class'=> 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class'=> 'alert alert-error'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if(empty($this->request->data['User']['passwd'])){
				unset($this->request->data['User']['passwd']);
			}
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'), 'default', array('class'=> 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class'=> 'alert alert-error'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->saveField('delete_flag', STATUS_ACTIVE)) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
