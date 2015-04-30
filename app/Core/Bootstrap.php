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

        // Initialize Environment variables.
        $this->initDotEnv();

        // Initialize Router.
        $this->initRouter();
    }

    /**
     * Load Environment Variables
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
        $this->router = new Router(new Database());

        $this->router->handleRequest();
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

}
