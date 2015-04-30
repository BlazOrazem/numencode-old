<?php

// Enable error reporting
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

// Set locale information
setlocale(LC_ALL, "Slovenian");
setlocale(LC_NUMERIC, 'C');

/**
 * Application root path
 */
define('APP_ROOT', __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR);

/**
 * Public root path
 */
define('PUBLIC_ROOT', APP_ROOT.'public'.DIRECTORY_SEPARATOR);

/**
 * Public root path
 */
define('VIEWS_ROOT', APP_ROOT.'resources/views'.DIRECTORY_SEPARATOR);

/**
 * Cache directory
 */
define('STORAGE_DIR', APP_ROOT.'storage'.DIRECTORY_SEPARATOR);

/**
 * Base URL
 */
define('BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].DIRECTORY_SEPARATOR);

/**
 * Smarty
 */
define('SMARTY_TEMPLATE_DIR', VIEWS_ROOT);
define('SMARTY_CACHE_DIR', STORAGE_DIR.'smarty_cache'.DIRECTORY_SEPARATOR);
define('SMARTY_COMPILE_DIR', STORAGE_DIR.'smarty_templates_c'.DIRECTORY_SEPARATOR);

//diebug('http://' . $_SERVER['HTTP_HOST']);
//diebug(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
//print_r(getenv('DB_HOST'));
//die;

//define('ABSPATH', '/');
//
//    // Web application URL
//	define('BASEURL',	'http://' . $_SERVER['HTTP_HOST'] . ABSPATH);
//
//	// Root path
//	define('APPROOT', str_replace('\\', '/', dirname(__FILE__)) . '/');
//
//	// Core folders
//	define('LIBS',		'libs/');
//	define('CDN',		LIBS . 'cdn/');
//	define('BASELIBS',	APPROOT . LIBS);
//	define('UTIL',		APPROOT . LIBS . 'util/');
//	define('CACHE_DIR',	APPROOT . 'cache/');
//	define('MEDIA_DIR',	APPROOT . 'media/');
//
//	// Smarty
//	define('SMARTY_DIR', 			APPROOT . LIBS . 'Smarty3/');
//	define('SMARTY_TEMPLATE_DIR', 	APPROOT . 'views/');
//	define('SMARTY_CACHE_DIR', 		CACHE_DIR . 'smarty_cache/');
//	define('SMARTY_COMPILE_DIR', 	CACHE_DIR . 'smarty_templates_c/');
//
//	// ReadBeanPHP ORM
//	define('REDBEAN_DIR', 			APPROOT . LIBS . 'RedBeanPHP/');
//
//	// Admin paths
//	define('ADMINURL',	BASEURL . 'Admin/');
//	define('DASH',		BASEURL . 'dash/');
//	define('AVIEW',		'views/Admin/');
//
//	// Public paths
//    define('THEMEDIR',		'default');
//	define('PVIEW',		'views/public/');
//	define('THEME',		'views/' . THEMEDIR . '/');
//	define('MEDIA',		'media/');
//
//	if (is_localhost()) {
//		// Local Hosted Libraries
//		define('JQUERY', 	CDN . 'jquery-1.11.1.min.js');
//		define('JQMIGRATE', CDN . 'jquery-migrate-1.2.1.min.js');
//		define('JQUI', 		CDN . 'jquery-ui-1.10.4.min.js');
//		define('JQCOOKIE', 	CDN . 'jquery.cookie-1.4.1.min.js');
//		define('CUPRUM', 	CDN . 'cuprum.css');
//	} else {
//		// Google Hosted Libraries
//		define('JQUERY', 	'//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js');
//		define('JQMIGRATE', '//code.jquery.com/jquery-migrate-1.2.1.min.js');
//		define('JQUI', 		'//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js');
//		define('JQCOOKIE', 	'//cdn.jsdelivr.net/jquery.cookie/1.4.1/jquery.cookie.min.js');
//		define('CUPRUM', 	'//fonts.googleapis.com/css?family=Cuprum:400,700,400italic&subset=latin,latin-ext');
//	}
//
//	// Language pack
//    define('ADMINLANG', 'en');
//	define('LANGPACK',	APPROOT . LIBS . 'lang/' . ADMINLANG . '/');
//
//	// Detect localhost
//	function is_localhost() {
//	    $whitelist = array( '127.0.0.1', '::1' );
//	    if( in_array( $_SERVER['REMOTE_ADDR'], $whitelist) )
//	        return true;
//	}