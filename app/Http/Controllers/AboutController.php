<?php
class AboutController extends BaseController {
	function __construct() {
		parent::__construct();
		$this->view->js = array('about/js/index');
	}

	function index() {
		$this->view->title = 'About - ' . APPLICATION_NAME;
		
		$this->view->getview('AboutController');
	}
}
?>