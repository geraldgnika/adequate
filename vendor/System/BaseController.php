<?php
class BaseController extends GetComponent {
	public function __construct() {
		$this->view = new BaseView();
		$this->model = new BaseModel();
	}
}
?>