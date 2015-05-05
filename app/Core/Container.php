<?php namespace App\Core;

class Container {

    /** @var array Bindings for Ioc Container */
    protected $bindings = array();

    /**
     * Create a new Container instance.
     */
    public function __construct()
    {
        $this->bindings['db'] = new Database();
    }

    /**
     * Return IoC binding.
     *
     * @param $binding
     * @return mixed
     */
    public static function get($binding)
    {
        $container = new self;
        return $container->bindings[$binding];
    }

}