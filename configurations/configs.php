<?php
// Always include trailing '/' slash in the end for directories

$dc_root = basename(dirname(__DIR__, 1));

// Global directory names
define('APPLICATION_NAME', "$dc_root"); // It takes the name of the project directory (dynamically)
// define('APPLICATION_NAME', "Adequate"); // Names it statically
define('BASE', 'http://localhost/' . strtolower($dc_root) . '/');
define('CONTROLLERS_DIR', 'app/Http/Controllers/');
define('MODELS_DIR', 'app/Http/');
define('VIEWS_DIR', 'resources/views/');
define('LIBS_BASEPATH', 'libs/external/');
define('PUBLIC_PATH', 'public/');
define("CONTROLLER_SUFFIX", "Controller");
define('VENDOR', 'vendor/System/');
define('UTILS', 'utilities/');
define("HELPERS", "app/Helpers/");
define("LIBS", "libs/");

// Global file names
define('INDEX_FILE', 'IndexController.php');
define('ERROR_FILE', 'ErrorController.php');
define('DEFAULT_HEADER_FILE', 'header.php');
define('DEFAULT_VIEW_FILE', 'index');
define('DEFAULT_FOOTER_FILE', 'footer.php');

// Global booleans
define('DEBUG_MODE', false);

// General hash key
define('HASH_GENERAL_KEY', 'To_move_forward_is_to_move_downwards');

// Hash key for database passwords
define('HASH_PASSWORD_KEY', 'Fear_is_the_mother_of_morality');
?>