<?php namespace App\Admin\Controllers;

use App\Core\Controller;

class AdminController extends Controller {

    protected function initModel()
    {
        $controllerName = $this->getControllerName();
        $modelName = $controllerName . 'Model';

        if (class_exists('\App\Admin\Models\\' . $modelName)) {
            $model = '\App\Admin\Models\\' . $modelName;
            $this->model = new $model();
        }

        return $this;
    }

    protected function getControllerName()
    {
        $controllerName = str_replace('App\Admin\Controllers\\', null, get_called_class());
        $controllerName = str_replace('Controller', null, $controllerName);
        return $controllerName;
    }

}