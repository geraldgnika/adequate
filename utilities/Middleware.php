<?php
class Middleware {
	public static function start () {
		Session::init();
	}

	// when client is in not logged in pages as logged in
	public static function isInNotLoggedInPages() {
		self::start();

		$loggedIn = Session::get('loggedIn');
		$admin = Session::get('admin');

		if ($loggedIn == false && $admin == true) {
			header('location: ' . BASE . 'admin');
			exit;
		}

		if ($loggedIn == true && $admin == false) {
			header('location: ' . BASE . 'profile');
			exit;
		}
	}

	// when client is in logged in pages as not logged in
	public static function isInLoggedInPages() {
		self::start();
		
		$loggedIn = Session::get('loggedIn');
		$admin = Session::get('admin');

		if ($loggedIn == false && $admin == false) {
			header('location: ' . BASE . 'login');
			exit;
		}
	}

	// when client is in logged in pages as logged in as admin
	public static function isAdminOnLoggedInUserPages() {
		self::start();
		
		$loggedIn = Session::get('loggedIn');
		$admin = Session::get('admin');

		if ($loggedIn == false && $admin == true) {
			header('location: ' . BASE . 'admin');
			exit;
		}
	}

	// when client is in logged in pages as logged in as a User
	public static function isUserOnLoggedInAdminPages() {
		self::start();
		
		$loggedIn = Session::get('loggedIn');
		$admin = Session::get('admin');

		if ($loggedIn == true && $admin == false) {
			header('location: ' . BASE . 'profile');
			exit;
		}
	}

	// settings page should have user id parameter in url
	public static function settingsId() {
		self::start();
		
		$loggedIn = Session::get('loggedIn');
		$admin = Session::get('admin');

		if ($loggedIn == true && $admin == false) {
			$segments = explode('/', $_SERVER['REQUEST_URI']);

			if (empty($segments[4])) {
				header('location: ' . BASE . 'settings/index/' . Session::get('id'));
				exit;
			}
		}

		if ($loggedIn == false && $admin == true) {
			$segments = explode('/', $_SERVER['REQUEST_URI']);

			if (empty($segments[4])) {
				header('location: ' . BASE . 'settings/index/' . Session::get('id'));
				exit;
			}
		}
	}

	// profile and admin page should have a user id parameter in url
	public static function profileAndAdminId() {
		self::start();
		
		$loggedIn = Session::get('loggedIn');
		$admin = Session::get('admin');

		if ($loggedIn == true && $admin == false) {
			$segments = explode('/', $_SERVER['REQUEST_URI']);

			if (empty($segments[4]) && $segments[3] !== 'logout') {
				header('location: ' . BASE . 'profile/index/' . Session::get('id'));
				exit;
			}
		}

		if ($loggedIn == false && $admin == true) {
			$segments = explode('/', $_SERVER['REQUEST_URI']);

			if (empty($segments[4]) && $segments[3] !== 'logout') {
				header('location: ' . BASE . 'admin/index/' . Session::get('id'));
				exit;
			}
		}
	}
}
?>