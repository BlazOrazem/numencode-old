<?php namespace App\Controllers;

use App\Core\Controller;

class Page extends Controller {

    public function index()
    {
        $args = func_get_args();
        debug($args);
    }

}