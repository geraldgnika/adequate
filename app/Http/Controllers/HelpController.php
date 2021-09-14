<?php
class HelpController extends BaseController {
	function __construct() {
		parent::__construct();
		$this->view->js = array('help/js/index');
	}

	function index() {
		$this->view->title = 'Help - ' . APPLICATION_NAME;

		$this->view->getview('HelpController');
	}

}
?>