<?php
class Settings extends BaseModel {
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

	public function selectAdmin($id) {
		return $this->db->retrieve('SELECT * FROM admin WHERE id = :id', array(':id' => $id));
	}

	public function selectUser($id) {
		return $this->db->retrieve('SELECT * FROM users WHERE id = :id', array(':id' => $id));
	}

	public function saveName($data, $table) {
		$this->db->update($table, array(
			'name' => $data['name'],
		), "`id` = {$data['id']}");
	}

	public function saveEmail($data, $table) {
		self::check_email($data, 'admin');
		self::check_email($data, 'users');

		$this->db->update($table, array(
			'email' => $data['email'],
		), "`id` = {$data['id']}");
	}

	public function saveUsername($data, $table) {
		self::check_username($data, 'admin');
		self::check_username($data, 'users');

		$this->db->update($table, array(
			'username' => $data['username'],
		), "`id` = {$data['id']}");
	}

	public function savePassword($data, $table) {
		$this->db->update($table, array(
			'password' => $data['password'],
		), "`id` = {$data['id']}");
	}

	public function delete($id, $table) {
		$this->db->delete($table, "id = '$id'");
	}
}
?>