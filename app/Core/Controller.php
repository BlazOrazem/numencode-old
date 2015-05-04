<?php namespace App\Core;

/**
 * Class Controller
 * @package App\Core
 */
abstract class Controller {

    /**
     * Model
     *
     * @var
     */
    public $model;

    /**
     * View
     *
     * @var
     */
    public $view;

    /**
     * Create a new Controller instance.
     */
    public function __construct()
    {
        $this->initModel();
        $this->initView();
    }

    /**
     * Create a new Model instance.
     *
     * @return $this
     */
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

    /**
     * Return Model instance.
     *
     * @param $tableName
     * @return bool
     */
    public function getModel($tableName)
    {
        $modelName = ucfirst($tableName) . 'Model';

        if (class_exists('\App\Models\\' . $modelName)) {
            $model = '\App\Models\\' . $modelName;
            return new $model();
        }

        return false;
    }

    /**
     * Create a new View instance.
     *
     * @return $this
     */
    protected function initView()
    {
        $this->view = new \App\Core\View();
        return $this;
    }

    /**
     * Return Controller name.
     *
     * @return mixed
     */
    protected function getControllerName()
    {
        $controllerName = str_replace('App\Controllers\\', null, get_called_class());
        $controllerName = str_replace('Controller', null, $controllerName);
        return $controllerName;
    }

}
