<?php
class IndexController extends BaseController {
	function __construct() {
		parent::__construct();
		$this->view->js = array('index/js/index');

		Middleware::isInNotLoggedInPages();
	}

	function index() {
		$this->view->title = APPLICATION_NAME;
		
		$this->view->getview('IndexController');
		
	}

	public function logout() {
		Session::destroy();
		ob_flush();
		header('location: ' . BASE);
		exit;
	}
}
?>