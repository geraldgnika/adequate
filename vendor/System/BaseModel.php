<?php
class BaseModel {
	function __construct() {
		$this->db = Database::getInstance();
	}
}
?>