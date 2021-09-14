<?php
abstract class User extends BaseModel {
	public function __construct() {
		parent::__construct();
	}

	public abstract function select($id);
}
?>