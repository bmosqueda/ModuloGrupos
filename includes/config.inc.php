<?php

////////////////////////////////////////////////////////////////////////////////
// Configure the default time zone
////////////////////////////////////////////////////////////////////////////////
date_default_timezone_set('MST');

////////////////////////////////////////////////////////////////////////////////
// Configure the default currency
////////////////////////////////////////////////////////////////////////////////
setlocale(LC_MONETARY, 'en_US');

////////////////////////////////////////////////////////////////////////////////
// Define constants for database connectivty
////////////////////////////////////////////////////////////////////////////////
defined('DATABASE_HOST') ? NULL : define('DATABASE_HOST', 'localhost');
defined('DATABASE_NAME') ? NULL : define('DATABASE_NAME', 'ModuloGrupos');
defined('DATABASE_USER') ? NULL : define('DATABASE_USER', 'serviciosu');
defined('DATABASE_PASSWORD') ? NULL : define('DATABASE_PASSWORD', 's3rvicio0su2018');

////////////////////////////////////////////////////////////////////////////////
// Define absolute application paths
////////////////////////////////////////////////////////////////////////////////

// Use PHP's directory separator for windows/unix compatibility
defined('DS') ? NULL : define('DS', DIRECTORY_SEPARATOR);
// Define absolute path to server root

defined('SITE_ROOT') ? NULL : define('SITE_ROOT', dirname(dirname(__FILE__)).DS);
//defined('PAGE_URL') ? NULL : define('PAGE_URL', 'localhost'.DS.'mysqli_estructura'.DS);

// Define absolute path to includes
defined('INCLUDE_PATH') ? NULL : define('INCLUDE_PATH', SITE_ROOT.'includes'.DS);
defined('FUNCTION_PATH') ? NULL : define('FUNCTION_PATH', INCLUDE_PATH.'functions'.DS);
defined('LIB_PATH') ? NULL : define('LIB_PATH', INCLUDE_PATH.'libraries'.DS);
defined('MODEL_PATH') ? NULL : define('MODEL_PATH', INCLUDE_PATH.'models'.DS);
defined('VIEW_PATH') ? NULL : define('VIEW_PATH', INCLUDE_PATH.'views'.DS);
defined('IMAGES_PATH') ? NULL : define('IMAGES_PATH', 'includes'.DS.'public'.DS.'images'.DS);
defined('JS_PATH') ? NULL : define('JS_PATH', INCLUDE_PATH.'public'.DS.'images'.DS);
defined('CSS_PATH') ? NULL : define('CSS_PATH', INCLUDE_PATH.'public'.DS.'images'.DS);
defined('BOOTSTRAP_PATH') ? NULL : define('BOOTSTRAP_PATH', JS_PATH.'bootstrap'.DS);
////////////////////////////////////////////////////////////////////////////////
// Include library, helpers, functions
////////////////////////////////////////////////////////////////////////////////
require_once(FUNCTION_PATH.'functions.inc.php');
require_once(LIB_PATH.'database.class.php');
require_once(MODEL_PATH.'postUser.model.php');