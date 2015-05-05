<?php namespace App\Core;

class Router {

    /** @var Database Establish the Database connection.  */
    protected $db;

    /** @var string Set the default Controller. */
    protected $controller = 'HomeController';

    /** @var string Set the default Method. */
    protected $method = 'index';

    /** @var array Set the parameters array. */
    protected $params = array();

    /** @var Locale. */
    protected $locale;

    /**
     * Create a new Router instance with Database constructor injection.
     *
     * @param Database $database
     * @param Locale $locale
     */
    public function __construct(Database $database, Locale $locale)
    {
        $this->db = $database;
        $this->locale = $locale;
    }

    /**
     * Handle the URL request.
     */
    public function handleRequest()
    {
        $urlData = $this->getUrlData();

        // Set the Controller.
        $this->controller = $urlData['controller'] ? ucfirst($urlData['controller'] . 'Controller') : $this->controller;

        // Set the Method.
        $this->method = $urlData['method'] ?: $this->method;

        // Initialize Controller.
        $this->controller = '\\App\Controllers\\' . $this->controller;
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
        $urlData = $this->db->getRow('SELECT * FROM url WHERE url = ? LIMIT 1', array($_GET['url']));
        
        // Else try to parse URL params.
        if (empty($urlData)) {
            $urlData = $this->parseUrl();
        }

        return $urlData;
    }

    /**
     * Try to set URL data from requested URL params.
     * 
     * @return array
     */
    protected function parseUrl()
    {
        $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        $urlData = array(
            'url' => null,
            'controller' => isset($url[0]) ? $url[0] : $this->controller,
            'method' => isset($url[1]) ? $url[1] : $this->method,
        );
        unset($url[0]);
        unset($url[1]);
        return array_merge($urlData, array(
            'params' => serialize(array_values($url)),
        ));
    }

}
