<?php
class Register extends BaseModel {
	public function __construct() {
		parent::__construct();
	}

	public static function check_username ($data, $table) {
		$u = "select * from " . $table . " where username = :username";
		$u = Database::getInstance()->prepare($u);
		$u->execute(array(':username' => $data['username']));

		if ($u->rowCount() > 0) {
			$error = rawurlencode(USERNAME_EXISTS);
			header("Location: " . BASE . "settings/index/" . $data['id'] . "?error=" . $error);
			die();
		}
	}

	public static function check_email ($data, $table) {
		$u = "select * from " . $table . " where email = :email";

		$u = Database::getInstance()->prepare($u);
		$u->execute(array(':email' => $data['email']));
		
		if ($u->rowCount() > 0) {
			$error = rawurlencode(EMAIL_EXISTS);
			header("Location: " . BASE . "settings/index/" . $data['id'] . "?error=" . $error);
			die();
		}
	}

	public function register($credentials) {
		self::check_email($credentials, 'admin');
		self::check_email($credentials, 'users');
		self::check_username($credentials, 'admin');
		self::check_username($credentials, 'admin');

		try {
			$sql = "INSERT INTO users (name, email, username, password) VALUES (:name, :email, :username, :password)";
			$stmt = $this->db->prepare($sql);

			$result = $stmt->execute(array(
				':name' => $credentials['name'],
				':email' => $credentials['email'],
				':username' => $credentials['username'],
				':password' => $credentials['password'],
			));

			$id = $this->db->lastInsertId('id');

			if ($result) {
				Session::init();

				Session::set('loggedIn', true);
				Session::set('id', $id);

				$cookie_name = "user";
				$cookie_value = "adequate";
				setcookie($cookie_name, $cookie_value, 2147483647);

				header('location: ' . BASE . 'profile/index/' . $id);
			} else {
				$error = rawurlencode(WE_NOT_REG);
				header("Location: " . BASE . "register/index?error=" . $error);
				die();
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}
?>