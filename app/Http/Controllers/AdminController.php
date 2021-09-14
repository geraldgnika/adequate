<?php
require('UserController.php');

class AdminController extends UserController {
	function __construct() {
		parent::__construct();
		$this->view->js = array('admin/js/index');

		Middleware::isUserOnLoggedInAdminPages();
		Middleware::profileAndAdminId();
	}

	// Polymorphic behaviour of overriding the index method on UserController at a runtime
	function index($id) {
		$admin = $this->model->select($id);
		$this->view->title = $admin['name'] . ' - ' . APPLICATION_NAME;
		
		$this->view->getview_with('AdminController', $admin);
	}

	public function logout() {
		Session::destroy();
		ob_flush();
		header('location: ' . BASE);
		exit;
	}
}
?>