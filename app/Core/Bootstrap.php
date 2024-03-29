<?php namespace App\Core;

/**
 * NumencodeCMS
 *
 * Content management system (requires PHP5.3>)
 *
 * @package 	NumencodeCMS
 * @author  	Blaž Oražem, blaz@orazem.info
 * @copyright   Copyright (c) 2015, Blaž Oražem, www.orazem.info
 * @license 	http://www.numencode.com/cms/license.html
 * @link    	http://www.numencode.com/
 * @since   	Version 1.0
 * @filesource
 * 
 */

class Bootstrap {

    /**
     * Router
     *
     * @var
     */
    protected $router;

    /**
     * Create a new Bootstrap instance.
     */
    public function __construct()
    {
        // Initialize Error Handler.
        $this->initWhoopsErrorHandler();

        // Start Session.
        $this->startSession();

        // Initialize Environment variables.
        $this->initDotEnv();

        // Initialize Router.
        $this->initRouter();
    }

    /**
     * Start a PHP session.
     */
    public function startSession()
    {
        $session = new \App\Core\Session();
    }

    /**
     * Load environment variables.
     */
    protected function initDotEnv()
    {
        $dot_env = new \Dotenv\Dotenv();
        $dot_env->load(APP_ROOT);
    }

    /**
     * Initialize Router and handle the URL request.
     */
    protected function initRouter()
    {
        $database = app_get('db');
        $this->router = new Router($database, new Locale($database));
        $this->router->handleRequest();
    }

    /**
     * Send any Exceptions or PHP errors to the Whoops! Error Handler.
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

}
