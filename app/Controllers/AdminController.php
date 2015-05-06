<?php namespace App\Controllers;

use App\Core\Controller;

class AdminController extends Controller {

    public function index()
    {
        diebug('To je admin prva stran.');
    }

    /**
     * Dump the MySQL database and store file to resources/sql.
     */
    public function dumpSql()
    {
        $fileName = 'D:\www\numencode\resources\sql\numencode.sql';
        $command = 'mysqldump --opt -h' . getenv('DB_HOST') . ' -u' . getenv('DB_USERNAME') . ' -p' . getenv('DB_PASSWORD') . ' ' . getenv('DB_DATABASE') . ' > ' . $fileName;
        $output = array();
        diebug($command);
        exec($command, $output, $worked);
        switch($worked){
            case 0:
                diebug('Database ' . getenv('DB_DATABASE') .' successfully exported to ' . RESOURCES_ROOT . 'sql');
            case 1:
                diebug('There was a warning during the export of ' . getenv('DB_DATABASE') .' to ' . RESOURCES_ROOT . 'sql');
            case 2:
                diebug('There was an error during export. Please check your database credentials.');
        }
    }

}