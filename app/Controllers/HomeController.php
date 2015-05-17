<?php namespace App\Controllers;

use App\Core\Database;
use BlazOrazem\Sanitizer;

class HomeController extends BaseController {

    public function index()
    {
        echo ('<meta charset="utf-8">');
        diebug('This is the front page home.');

//        $url = Sanitizer::url('asdfasdf#$%"3f432f42čf42.423gf53g5p');
//        diebug($url);

//        $schema = Database::getAll('describe menu_i18n');
//        diebug($schema);
    }

}