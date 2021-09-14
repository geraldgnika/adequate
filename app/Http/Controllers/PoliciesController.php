<?php
class PoliciesController extends BaseController {
	function __construct() {
		parent::__construct();
		$this->view->js = array('policies/js/index');
	}

	public function conds() {
		$this->view->title = 'Terms - ' . APPLICATION_NAME;

		$this->view->getview('PoliciesController', 'conds');
	}

	public function cookies() {
		$this->view->title = 'Cookies - ' . APPLICATION_NAME;

		$this->view->getview('PoliciesController', 'cookies');
	}

	public function disclaimer() {
		$this->view->title = 'Disclaimer - ' . APPLICATION_NAME;

		$this->view->getview('PoliciesController', 'disclaimer');
	}

	public function eula() {
		$this->view->title = 'EULA - ' . APPLICATION_NAME;

		$this->view->getview('PoliciesController', 'eula');
	}

	public function privacy() {
		$this->view->title = 'Privacy - ' . APPLICATION_NAME;

		$this->view->getview('PoliciesController', 'privacy');
	}
}
?>