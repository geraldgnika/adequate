<?php
class DocumentationController extends BaseController {
	function __construct() {
		parent::__construct();
		$this->view->js = array('documentation/js/index');

		Middleware::isInNotLoggedInPages();
	}

	function index() {
		$this->view->title = APPLICATION_NAME . ' - Documentation';
		
		$this->view->getview('DocumentationController');
	}
}
?>