<?php namespace App\Core;

abstract class Controller {

    public $model;

    public function __construct()
    {
        $this->initModel();
        $this->initView();
    }

    protected function initModel()
    {
        $controllerName = $this->getControllerName();
        $modelName = $controllerName . 'Model';

        if (class_exists('\App\Models\\' . $modelName)) {
            $model = '\App\Models\\' . $modelName;
            $this->model = new $model();
        }

        return $this;
    }

    protected function initView()
    {
        $this->view = new \App\Core\View();
        return $this;
    }

    protected function getControllerName()
    {
        $controllerName = str_replace('App\Controllers\\', null, get_called_class());
        $controllerName = str_replace('Controller', null, $controllerName);
        return $controllerName;
    }
}
