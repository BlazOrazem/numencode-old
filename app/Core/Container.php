<?php namespace App\Core;

class Container {

    /** @var array Bindings for Ioc Container */
    protected $bindings = array();
    
    /** @var Container Instance of the Container */
    protected static $instance = null;

    /**
     * Create a new Container instance.
     */
    protected function __construct()
    {
        $this->bindings['db'] = new Database();
    }
    
    /**
     * Get a singleton Container instance 
     */
    public static function getInstance()
    {
        if(static::$instance) return static::$instance;
        
        static::$instance = new static;
        
        return static::$instance;
    }

    /**
     * Return IoC binding.
     *
     * @param $binding
     * @return mixed
     */
    public static function get($binding)
    {
        $container = static::getInstance();
        
        return $container->bindings[$binding];
    }

}
