<?php
require('UserController.php');

class ProfileController extends UserController {
	function __construct() {
		parent::__construct();
		$this->view->js = array('profile/js/index');

		Middleware::isAdminOnLoggedInUserPages();
		Middleware::profileAndAdminId();
	}

	public function index($id) {
		$user = $this->model->select($id);
		$this->view->title = $user['name'] . ' - ' . APPLICATION_NAME;
		
		$this->view->getview_with('ProfileController', $user);
	}

	public function logout() {
		Session::destroy();
		ob_flush();
		header('location: ' . BASE);
		exit;
	}
}
?>