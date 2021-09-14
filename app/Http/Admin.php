<?php
require('User.php');

class Admin extends User {
	public function __construct() {
		parent::__construct();
	}

	public function select($id) {
		return $this->db->retrieve('SELECT * FROM admin WHERE id = :id', array(':id' => $id));
	}
}
?>