<?php namespace App\Core;

class BaseController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->includeMainMenu();
        $this->includeFooter();
    }

    public function includeMainMenu()
    {
//        $articles  = $this->getModel('article')->getItems();
//        diebug($articles);

        $menu = $this->view->fetch('menu.tpl');
        $this->view->assign('_menu', $menu);
    }

    public function includeFooter()
    {
        $this->view->assign('subtitle', '@to je footer var@');
        $footer = $this->view->fetch('footer.tpl');
        $this->view->assign('_footer', $footer);
    }

}