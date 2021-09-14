<?php
	class LibraryFacade {
		private $_basepath = LIBS_BASEPATH;
		private $_library = null;

		public function __construct () {}

		public static function connect_library ($libname, $classnames = []) {
			// Finding the main class of the library
			import_library($libname, $classnames);
		}

		public function validate_library ($classname) {
			if($classname{0} === strtoupper($classname{0})) {
			   return true;
			} else {
			   return false;
			}
		}

		public function import_library ($libname, $classnames = []) {
			// Main file should be a PHP file
			$lib = $_basepath . $libname . '/' . $name . ".php";
			
			if (file_exists($lib)) {
				require $lib;
				// Instantiating it
				inst($classnames);
			} else {
				die(LIB_REQ_FAILED);
			}
		}

		public function inst ($classnames = []) {
			foreach ($classnames as $classname) {
				if (validate_library($classname) == true) {
					$this->_library = new $classname();
				} else {
					die("Class name of: " . $classname . " can't begin with lowercase!");
				}
			}
		}
	}
?>