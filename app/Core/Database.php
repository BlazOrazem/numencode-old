<?php namespace App\Core;

use RedBeanPHP\Facade as R;

class Database extends R {

    public function __construct()
    {
        parent::setup('mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_DATABASE'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
        parent::freeze(false);
    }

}
