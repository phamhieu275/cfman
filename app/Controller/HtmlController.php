<?php
class HtmlController extends AppController {
	var $uses = null;
	
	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow();
	}
	
	public function login() {
		$this->layout = 'login';
	}
	
	public function index() {
		
	}
	
	public function sale() {
		
	}
	
	public function sale_staff() {
		
	}
	
	public function sale_zone() {
		
	}
	
	public function menu() {
		
	}
	
	public function menu_add() {
		
	}
	
	public function book() {
		;
	}
	
	public function book_add() {
		;
	}
	
	public function order() {
		/**
		 * @todo: Chua responsive duoc tren man hinh iPhone 3Gs
		 */
	}
	
	public function order_wait() {
		
	}
	
	public function order_waiter() {
		
	}
	
	public function store() {
		
	}
	
	public function others() {
		
	}
	
	public function others_customer() {
		
	}
	
	public function user() {
		
	}
	
	public function user_add() {
		
	}
	
	public function display_404() {
		
	}
}