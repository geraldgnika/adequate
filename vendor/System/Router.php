<?php
class Router {
	private $_controllerDir = CONTROLLERS_DIR;
	private $_modelDir = MODELS_DIR;
	private $_indexFile = INDEX_FILE;
	private $_errorFile = ERROR_FILE;
	
	private $_url = null;
	private $_controllerInstance = null;

	/**
	 * Loads Controllers
	 * @return boolean
	 */
	public function initiate() {
		$this->_fetchUrl();

		// Start the controller loading process
		$this->_getController();
		$this->_urlDispatcher();
	}

	/**
	 * Fetches the url
	 */
	private function _fetchUrl() {
		// Check if URL exists
		$url = isset($_GET['url']) ? $_GET['url'] : null;

		// Defragment the url parts without the trailing slash
		$url = rtrim($url, '/');

		// Check if URL is valid
		$url = filter_var($url, FILTER_SANITIZE_URL);

		// Assign this processed url to the private $_url instance
		$this->_url = explode('/', $url);
	}

	/**
	 * This loads if there is no parameter after domain name
	 */
	private function _getController() {
		if (empty($this->_url[0])) {
			require $this->_controllerDir . $this->_indexFile;
			$this->_controllerInstance = new IndexController();
		} else {
			$controller = $this->_controllerDir . $this->_url[0] . CONTROLLER_SUFFIX . '.php';
			$controllerClass = $this->_url[0] . CONTROLLER_SUFFIX;

			if (file_exists($controller)) {
				require $controller;

				// Check if class is abstract to make sure not to be instantiated
				$class = new ReflectionClass($controllerClass);

				if (!$class->isAbstract()) {
					$this->_controllerInstance = new $controllerClass;
					
					if (file_exists("app/Http/" . $this->_url[0] . ".php")) {
						$this->_controllerInstance->getmodel($this->_url[0], $this->_modelDir);
					}
				}
			} else {
				$this->_error();
				return false;
			}
		}
	}

	/**
	 *	Dispatcher Method (Decides which part of the URL to call)
	 *	Logic of the routing if a method is passed in the GET url paremter
	 *  protocol://host/controller/method/(parameter)/(parameter)/(parameter)
	 *  url[0] = Controller
	 *  url[1] = Method
	 *  url[2] = Parameter
	 *  url[3] = Parameter
	 *  url[4] = Parameter
	 */
	private function _urlDispatcher() {
		$defragmentedUrlLength = count($this->_url);

		// Does the method exist
		if ($defragmentedUrlLength > 1) {
			if (!method_exists($this->_controllerInstance, $this->_url[1])) {
				$this->_error();
			}
		}

		// The loading proccess
		switch ($defragmentedUrlLength) {
			case 5:
				// Controller->Method(Parameter1, Parameter2, Parameter3)
				$this->_controllerInstance->{$this->_url[1]} (
					$this->_url[2],
					$this->_url[3],
					$this->_url[4]
				);
				break;

			case 4:
				// Controller->Method(Parameter1, Parameter2)
				$this->_controllerInstance->{$this->_url[1]} (
					$this->_url[2],
					$this->_url[3]
				);
				break;

			case 3:
				// Controller->Method(Parameter1)
				$this->_controllerInstance->{$this->_url[1]} (
					$this->_url[2]
				);
				break;

			case 2:
				// Controller->Method
				$this->_controllerInstance->{$this->_url[1]} ();
				break;

			default:
				// Controller (default|index)
				$this->_controllerInstance->index();
				break;
		}
	}

	/**
	 * Display an error page if something does not exist
	 * @return boolean
	 */
	private function _error() {
		require $this->_controllerDir . $this->_errorFile;
		$this->_controllerInstance = new ErrorController();
		$this->_controllerInstance->index();
		die();
	}
}
?>