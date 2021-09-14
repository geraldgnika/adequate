<?php
/**
 * The project index file
 *
 * @category   Web Development Environment Framework, Web-based Application
 * @author     Gerald Nika <nikageri01@gmail.com> | <gerald.nika@cit.edu.al>
 * @copyright  2020 Gerald Nika
 * @link       https://www.adequate.com/
 * @since      File available since Release 1.0.0
 */

require __DIR__ . '/configurations/configs.php';
require __DIR__ . '/configurations/database_params.php';
require __DIR__ . '/lang/predefined/errors.php';

// Autoloader function

$dirs = [VENDOR, UTILS, HELPERS, LIBS];

function autoloader ($dirs) {
    foreach ($dirs as $dir) {
        spl_autoload_register(function($class) use ($dir) {
            $file = $dir . $class . ".php";

            if (file_exists($file)) {
                require $file;

                if (class_exists($class)) {
                    return true;
                }
            }

            return false;
        });
    }
}

autoloader($dirs);

$ext_sec = new ExternalSecurity();

// Instantiate and run the Router class
$router = new Router();
$router->initiate();
?>