<?php
class SettingsController extends BaseController {
	public function __construct() {
		parent::__construct();
		$this->view->js = array('settings/js/index');

		Middleware::isInLoggedInPages();
		Middleware::settingsId();
	}

	public function index($id) {
		$this->view->title = 'Settings - ' . APPLICATION_NAME;

		if (Session::get('loggedIn') == true) {
			$user = $this->model->selectUser($id);
			$this->view->getview_with('SettingsController', $user);
		}

		if (Session::get('admin') == true) {
			$admin = $this->model->selectAdmin($id);
			$this->view->getview_with('SettingsController', $admin);
		}
	}

	public static function getTable () {
		$table = null;

		if (Session::get('admin') == true) {
			$table = 'admin';
		} else {
			$table = 'users';
		}

		return $table;
	}

	public function saveName ($id) {
		$table = self::getTable();

		$data = array();
		$data['id'] = $id;
		$data['name'] = ExternalSecurity::isolateData(
							ucfirst($_GET['name'])
						);

		if ($_SERVER['REQUEST_METHOD'] == GET) {
			if (strlen($_GET['name']) < 20) {
				$this->model->saveName($data, $table);
				header('location: ' . BASE . 'settings/index/' . $id);
			} else {
				Helpers::url_encode_error("SettingsController", LESS_THAN_20, $id);
			}
		}
	}

	public function saveEmail ($id) {
		$table = self::getTable();

		$data = array();
		$data['id'] = $id;
		$data['email'] = ExternalSecurity::isolateData($_GET['email']);

		if ($_SERVER['REQUEST_METHOD'] == GET) {
			if ((strpos($_GET["email"], "@")) !== false) {
				$this->model->saveEmail($data, $table);
				header('location: ' . BASE . 'settings/index/' . $id);
			} else {
				Helpers::url_encode_error("SettingsController", EMAIL_NOT_VALID, $id);
			}
		}
	}

	public function saveUsername($id) {
		$table = self::getTable();

		$data = array();
		$data['id'] = $id;
		$data['username'] = ExternalSecurity::isolateData($_GET['username']);
		
		if ($_SERVER['REQUEST_METHOD'] == GET) {
			if (strlen($_GET["username"]) > 5) {
				$this->model->saveUsername($data, $table);
				header('location: ' . BASE . 'settings/index/' . $id);
			} else {
				Helpers::url_encode_error("SettingsController", USERNAME_NOT_VALID, $id);
			}
		}
	}

	public function savePassword($id) {
		$table = self::getTable();

		$data = array();
		$data['id'] = $id;
		$data['password'] = ExternalSecurity::isolateData(
								Encrypt::encryptData(
									'sha256', $_POST['password'], HASH_PASSWORD_KEY
								)
							);

		if ($_SERVER['REQUEST_METHOD'] == POST) {
			if (strlen($_POST["password"]) > 8) {
				$this->model->savePassword($data, $table);
				header('location: ' . BASE . 'settings/index/' . $id);
			} else {
				Helpers::url_encode_error("SettingsController", PASSWORD_NOT_VALID, $id);
			}
		}
	}

	public function delete($id) {
		$table = self::getTable();

		$this->model->delete($id, $table);
		UserController::logout();
	}
}
?>