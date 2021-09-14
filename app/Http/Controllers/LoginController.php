<?php
class LoginController extends BaseController {
	function __construct() {
		parent::__construct();
		$this->view->js = array('login/js/index');

		Middleware::isInNotLoggedInPages();
	}

	function index() {
		$this->view->title = 'Login - ' . APPLICATION_NAME;
		
		$this->view->getview('LoginController');
	}

	function login() {
		$fields = array("username", "password");

		if (FormValidator::formIsSet("login", $fields, "login") !== false) {
			$credentials = array();

			$credentials['username'] = ExternalSecurity::isolateData($_POST['username']);
			$credentials['password'] = ExternalSecurity::isolateData(
											Encrypt::encryptData(
												'sha256', $_POST['password'], HASH_PASSWORD_KEY
											)
										);

			$this->model->login($credentials);
		}
	}
}
?>