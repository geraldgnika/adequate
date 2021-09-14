<?php
class BaseView extends GetComponent {
	function __construct() {
		$this->model = new BaseModel();
	}
}
?>