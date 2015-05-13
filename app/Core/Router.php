<?php namespace App\Core;

class Router {

    /** @var Database class Database constructor injection.  */
    protected $db;

    /** @var string Set the Plugin. */
    protected $plugin;

    /** @var string Set the default Controller. */
    protected $controller = 'HomeController';

    /** @var string Set the default Method. */
    protected $method = 'index';

    /** @var array Set the parameters array. */
    protected $params = array();

    /** @var string Set the Locale. */
    protected $locale;

    /** @var string Set the default Controller path. */
    protected $controllerPath = '\\App\Controllers\\';

    /** @var string Set the default Model path. */
    protected $modelPath = '\\App\Models\\';

    /**
     * Create a new Router instance.
     *
     * @param Database $database Database instance
     * @param Locale $locale Locale instance
     */
    public function __construct(Database $database, Locale $locale)
    {
        $this->db = $database;
        $this->locale = $locale;
        $this->setIocPaths();
    }

    /**
     * Send controller and model paths to IoC container.
     */
    protected function setIocPaths()
    {
        app_set('controller_path', $this->controllerPath);
        app_set('model_path', $this->modelPath);
    }

    /**
     * Handle the URL request.
     */
    public function handleRequest()
    {
        $urlData = $this->getUrlData();
//        diebug($urlData);
        // Set the Controller.
        $this->controller = $urlData['controller'] ? ucfirst($urlData['controller'] . 'Controller') : $this->controller;

        // Set the Method.
        $this->method = $urlData['method'] ?: $this->method;

        // Set the Plugin if requested.
        $this->plugin = $urlData['plugin'] ? ucfirst($urlData['plugin']) : null;

        // Set paths for plugin if exists.
        if (!empty($this->plugin)) {
            $this->setPluginPaths($this->plugin);
        }

        // Initialize Controller.
        $this->controller = $this->controllerPath . $this->controller;
        $this->controller = new $this->controller();

        // Set parameters to either the array values or an empty array.
        $this->params = !empty($urlData['params']) ? unserialize($urlData['params']) : $this->params;

        // Call the chosen method on the chosen controller, passing
        // in the parameters array (or empty array if above was false).
        call_user_func_array(array($this->controller, $this->method), $this->params);
    }

    /**
     * Parse the URL for the current request. Effectively split it,
     * store the controller, the method for that controller
     * and potential params for that method.
     *
     * @return array
     */
    protected function getUrlData()
    {
        if (!isset($_GET['url'])) return false;

        // Check if URL exists in Database.
        $urlData = $this->db->getRow('SELECT * FROM url WHERE slug = ? LIMIT 1', array($_GET['url']));

        // Else try to parse URL request.
        if (empty($urlData)) {
            $urlData = $this->prepareUrlData();
        }

        return $urlData;
    }

    /**
     * Attempt to prepare URL data from URL request.
     *
     * @return array URL data
     */
    protected function prepareUrlData()
    {
        // Split URL request
        $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));

        // Set the plugin if requested
        if (isset($url[0]) && (strtolower($url[0]) == 'plugins')) {
            $this->plugin = $url[1];
            $url = array_slice($url, 2);
        }

        // Prepare and return URL data
        $urlData = array(
            'slug' => null,
            'plugin' => !empty($this->plugin) ? $this->plugin : null,
            'controller' => isset($url[0]) ? $url[0] : $this->controller,
            'method' => isset($url[1]) ? $url[1] : $this->method,
        );
        $url = array_slice($url, 2);
        return array_merge($urlData, array(
            'params' => serialize($url),
        ));
    }

    /**
     * Set controller path.
     *
     * @param $plugin
     */
    protected function setPluginPaths($plugin)
    {
        $this->controllerPath = '\\App\Plugins\\'. ucfirst($plugin) .'\\Controllers\\';
        $this->modelPath = '\\App\Plugins\\'. ucfirst($plugin) .'\\Models\\';
        $this->setIocPaths();
    }

}
