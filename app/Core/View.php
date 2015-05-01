<?php namespace App\Core;

class View extends \Smarty {

    public function __construct()
    {
        $this->caching = false;
        $this->template_dir = SMARTY_TEMPLATE_DIR;
        $this->compile_dir = SMARTY_COMPILE_DIR;
        $this->cache_dir = SMARTY_CACHE_DIR;
    }

}
