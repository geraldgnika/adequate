<?php
class Session {
	// Open a session
	public static function init() {
		@session_start();
	}

	// Initialize a session with a key and value
	public static function set($key, $value) {
		$_SESSION[$key] = $value;
	}

	// Retrieve a session's value using key as a parameter
	public static function get($key) {
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		}
	}

	// Check if session exists
	public static function exists ($key) {
		return (isset($_SESSION[$key])) ? true : false;
	}

	// Close a session
	public static function destroy() {
		session_destroy();
	}
}
?>