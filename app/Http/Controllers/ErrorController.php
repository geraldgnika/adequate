<?php
class ErrorController extends BaseController {
	function __construct() {
		parent::__construct();
		$this->view->js = array('error/js/index');
	}

	public function index() {
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		
		$this->view->msg = "<b>" . $url . "</b>" . "<span class='thin'>" . NOT_EXISTS . "</span>";

		$this->view->title = '404 Error - ' . APPLICATION_NAME;
		
		$this->view->getview('ErrorController');
	}
}
?>