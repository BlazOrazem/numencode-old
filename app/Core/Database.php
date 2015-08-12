<?php namespace App\Core;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database extends Capsule {

    public function __construct()
    {
        $capsule = new Capsule;

        $capsule->addConnection(array(
            'driver'    => 'mysql',
            'host'      => getenv('DB_HOST'),
            'database'  => getenv('DB_DATABASE'),
            'username'  => getenv('DB_USERNAME'),
            'password'  => getenv('DB_PASSWORD'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => ''
        ));

        $capsule->bootEloquent();
    }

}
