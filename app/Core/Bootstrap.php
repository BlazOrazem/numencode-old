<?php namespace App\Core;

/**
 * NumencodeCMS
 *
 * Content management system (requires PHP5>)
 *
 * @package 	NumencodeCMS
 * @author  	Blaž Oražem, blaz@orazem.info
 * @copyright   Copyright (c) 2013, Blaž Oražem, www.orazem.info
 * @license 	http://www.numencode.com/cms/license.html
 * @link    	http://www.numencode.com/
 * @since   	Version 1.0
 * @filesource
 * 
 */

class Bootstrap {

    /**
     * Store the controller from the split URL
     *
     * @var string
     */
    protected $controller = 'Home';

    /**
     * Store the method from the split URL
     * @var string
     */
    protected $method = 'index';

    /**
     * Store the parameters from the split URL
     * @var array
     */
    protected $params = [];

    public function __construct()
    {
        // Error Handler Init
        $this->initWhoopsErrorHandler();

        // Split the URL
        $url = $this->parseUrl();

        // Set default Controller if $url is empty
        if (empty($url[0])) {
            $url[0] = ucfirst($this->controller);
        }

        // Set default Method if $url is empty
        if (empty($url[1])) {
            $url[1] = $this->method;
        }

        // Initialize Controller
        $this->controller = '\\App\Controllers\\' . ucfirst($url[0]);
        $this->controller = new $this->controller(); // Initialize Class
        $this->controller->$url[1](); // Run method

        // Unset Controller and Method
        unset($url[0]);
        unset($url[1]);

        // Set parameters to either the array values or an empty array
        $this->params = $url ? array_values($url) : [];

        // Call the chosen method on the chosen controller, passing
        // in the parameters array (or empty array if above was false)
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * Send any Exceptions or PHP errors to the Whoops! Error Handler
     *
     * @return $this
     */
    public function initWhoopsErrorHandler()
    {
        $whoops = new \Whoops\Run();
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
        return $this;
    }

    /**
     * Parse the URL for the current request.
     * Effectively splits it, stores the controller
     * and the method for that controller.
     *
     * @return void
     */
    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            // Explode a trimmed and sanitized URL by /
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }

}
