<?php

// Enable error reporting
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

// Set locale information
setlocale(LC_ALL, "Slovenian");
setlocale(LC_NUMERIC, 'C');

// Root path for inclusion
define('INC_ROOT', dirname(__DIR__));

// Require composer autoloader
require INC_ROOT . "/vendor/autoload.php";

//Root URL
define('HTTP_ROOT',
    'http://'.$_SERVER['HTTP_HOST'].
    str_replace(
        $_SERVER['DOCUMENT_ROOT'],
        '',
        str_replace('\\', '/', INC_ROOT).'/public'
    )
);

// Load the Bootstrap
$app = new App\Core\Bootstrap();

//
//$adm = new App\admin\controllers\Admin();
//$adm->index();



//$klein = new \Klein\Klein();
//$klein->respond('/[:name]', function ($request) {
//    return 'Hello ' . $request->name;
//});
//$klein->respond(function () {
//    return 'All the things';
//});
//$klein->respond('GET', 'admin', function () {
//    return 'Hello World!';
//});
//
//$klein->dispatch();