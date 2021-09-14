<?php
class RegisterController extends BaseController {
	function __construct() {
		parent::__construct();
		$this->view->js = array('register/js/index');

		Middleware::isInNotLoggedInPages();
	}

	function index() {
		$this->view->title = 'Register - ' . APPLICATION_NAME;

		$this->view->getview('RegisterController');
	}

	function register() {
		$fields = array("name", "email", "username", "password");

		if (FormValidator::formIsSet("register", $fields, "register") !== false) {
			if (FormValidator::fieldLength("name") !== false) {
				if (FormValidator::emailValid("email") !== false) {
					if (FormValidator::usernameValid("username") !== false) {
						if (FormValidator::passwordValid("password") !== false) {
							$data = array();
							
							$data['name'] = ExternalSecurity::isolateData(
														ucfirst($_POST['name'])
													);
							
							$data['email'] = ExternalSecurity::isolateData($_POST['email']);
							$data['username'] = ExternalSecurity::isolateData($_POST['username']);
							
							$data['password'] = ExternalSecurity::isolateData(
															Encrypt::encryptData(
																'sha256', $_POST['password'],
																HASH_PASSWORD_KEY
															)
														);

							$this->model->register($data);
						}
					}
				}
			}
		}
	}
}
?>