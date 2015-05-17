<?php namespace App\Core;

abstract class Controller {

    /** @var Model */
    public $model;

    /** @var View */
    public $view;

    /**
     * Create a new Controller instance.
     */
    public function __construct()
    {
        $this->model = $this->initModel();
        $this->view = new \App\Core\View();
    }

    /**
     *  Create a new Model instance.
     *
     * @return object|bool
     */
    protected function initModel()
    {
        $pluginName = str_replace('Controller', null, substr(get_called_class(), strrpos(get_called_class(), '\\') + 1));
        $modelName = $pluginName . 'Model';

        if (!class_exists(app_get('model_path') . $modelName)) {
            return false;
        }

        $model = app_get('model_path') . $modelName;
        return new $model();
    }

    /**
     * Return Model instance.
     *
     * @param string $table Requested table.
     * @param string|null $plugin Requested plugin.
     * @return object|bool
     */
    public function getModel($table, $plugin = null)
    {
        $modelPath = empty($plugin) ? '\\App\Models\\' : '\\App\Plugins\\'. ucfirst($plugin) .'\\Models\\';

        if (!class_exists($modelPath . ucfirst($table) . 'Model')) {
            return false;
        }

        $model = $modelPath . ucfirst($table) . 'Model';
        return new $model();
    }

}
