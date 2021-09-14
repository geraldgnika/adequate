<?php
class GetComponent {
	public $data = null;

	/**
	 * @param string $name: Name of the model
	 * @param string $dir: Directory of the models
	 */
	public function getmodel($name, $dir = MODELS_DIR) {
		$model = $dir . $name . ".php";

		if (file_exists($model)) {
			require $model;
			$className = $name;
			$this->model = new $className();
		} else {
        	die(MODEL_REQ_FAILED);
        }
	}

	/**
	 * @param string $name: Name of the model
	 * @param string $dir: Directory of the views
	 */
	public function getview($controller, $view_file = DEFAULT_VIEW_FILE) {
		// Exclude the 'Controller' suffix from the controller class name
		$view_name = strtolower(strstr($controller, 'Controller', true));
    	$view = VIEWS_DIR . $view_name . '/' . $view_file . '.php';

    	if (file_exists($view)) {
            require VIEWS_DIR . DEFAULT_HEADER_FILE;
            require $view;
            require VIEWS_DIR . DEFAULT_FOOTER_FILE;
        } else {
        	die(VIEW_REQ_FAILED);
        }
	}

	/**
	 * @param string $name: Name of the model
	 * @param string $dir: Directory of the views
	 */
	public function getview_with($controller, $data, $view_file = DEFAULT_VIEW_FILE) {
		// Exclude the 'Controller' suffix from the controller class name
		$view_name = strtolower(strstr($controller, 'Controller', true));
    	$view = VIEWS_DIR . $view_name . '/' . $view_file . '.php';

    	if (file_exists($view)) {
    		if (is_array($data)) {
    			$this->data = $data;
    		} else {
    			$this->data = $data;
    		}

            require VIEWS_DIR . DEFAULT_HEADER_FILE;
            require $view;
            require VIEWS_DIR . DEFAULT_FOOTER_FILE;
        } else {
        	die(VIEW_REQ_FAILED);
        }
	}
}
?>