<?php
require('User.php');

class Profile extends User {
	public function __construct()  {
		parent::__construct();
	}

	public function select($id) {
		return $this->db->retrieve('SELECT * FROM users WHERE id = :id', array(':id' => $id));
	}
}
?>