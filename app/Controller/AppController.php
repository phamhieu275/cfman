<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	/**
	 * Models
	 *
	 * @var array
	 * @access public
	 */
	public $uses = array(
		'User',
	);
	
	/**
	 * Components
	 *
	 * @var array
	 * @access public
	 */
	public $components = array(
		'Auth',
		'Session',
		'Cookie',
		'DebugKit.Toolbar',
	);
	
	/**
	 * beforeFilter
	 *
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->authorize = array('Controller');
		$this->Auth->autoRedirect = false;
		$this->Auth->logoutRedirect = array('controller'=> 'users', 'action'=> 'login');
		$this->Auth->authError = __('You are not authorized to access that location.');
		if (isset($this->request->params['admin'])) {
			$this->Auth->userScope = array('User.group'=> GROUP_ADMINISTRATOR);
			$this->Auth->loginRedirect = '/admin';
		}else {
			$this->Auth->userScope = array('User.group'=> GROUP_STAFF);
			$this->Auth->loginRedirect = '/';
		}
	}
	
	public function isAuthorized($user = null) {
		// Only admins can access admin functions
		// Only users can access user functions
		if ((!isset($this->request->params['admin']) && (intval($user['group']) == GROUP_ADMINISTRATOR)) || (isset($this->request->params['admin']) && (intval($user['group']) !== GROUP_ADMINISTRATOR))){
			$this->Session->destroy();
			return false;
		}
		return true;
	}
}
