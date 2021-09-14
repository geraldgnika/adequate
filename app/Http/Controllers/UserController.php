<?php
abstract class UserController extends BaseController {
	function __construct() {
		parent::__construct();

		Middleware::isInLoggedInPages();
	}

	public abstract function index ($id);
}
?>