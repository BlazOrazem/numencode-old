<?php namespace App\Core;

class Container {

    /** @var array Bindings for IoC Container */
    protected $bindings = array();
    
    /** @var Container instance of the Container */
    protected static $instance = null;

    /**
     * Create a new Container instance.
     */
    protected function __construct()
    {
        $this->bindings['db'] = new Database();
    }
    
    /**
     * Get a singleton Container instance.
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

    /**
     * Set IoC binding.
     *
     * @param $binding
     * @return mixed
     */
    public static function set($binding, $value)
    {
        $container = static::getInstance();

        $container->bindings[$binding] = $value;
    }

}
