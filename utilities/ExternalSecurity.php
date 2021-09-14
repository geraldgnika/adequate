<?php
class ExternalSecurity {
	public function __construct () {
		$this->_error_reportings();
		$this->_unregister_globals();
	}
	
	/**
	 * Secures the raw data inputted from the user
	 * return self
	 */
	public static function isolateData($input) {
		/* Removes the white spaces and other predefined characters from the
		 * left and right sides of a string
		 */
		$input = trim($input);

		/* Does not simply skip the C-style escape sequences
		 * \a, \b, \f, \n, \r, \t and \v, but converts them to their actual meaning
		 */		
		$input = stripcslashes($input);

		// Removes backslashes added by the addslashes() function
		$input = stripslashes($input);

		// Converts characters to HTML entities
		$input = htmlentities($input);

		// Converts special characters to HTML entities
		$input = htmlspecialchars($input);

		return $input;
	}

	// Handle error dumping
	private function _error_reportings () {
		if (DEBUG_MODE == false) {
			// Hide all the errors and don't log them
			error_reporting(0);
			ini_set('display_errors', 0);
			ini_set('log_errors', 0);
		} else {
			// Display all the errors and log them into a file
			ini_set('display_errors', 1);
			ini_set('log_errors', 1);
			ini_set('error_log', 'logs/errors.log');
			error_reporting(E_ALL);
		}
	}

	// Prevent data overriding from form submittions and global variable interactions
	private function _unregister_globals () {
		// If a value is submitted using a global variable
		if (ini_get('register_globals')) {
			$globals = [
				'_SERVER', 'REQUEST',
				'_GET', '_POST',
				'_COOKIE', '_SESSION',
				'_FILES', '_ENV'
			];
			
			// Iterate through all the globals
			foreach ($globals as $global) {
				// Get the value and key foreach specific global
				foreach ($GLOBALS[$global] as $key => $value) {
					if ($GLOBALS[$key] === $value) {
						unset($GLOBALS[$k]);
					}
				}
			}
		}
	}
}
?>