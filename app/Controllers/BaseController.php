<?php namespace App\Controllers;

use App\Core\Controller;

class BaseController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->includeMainMenu();
        $this->includeFooter();
    }

    public function includeMainMenu()
    {
//        $articles  = $this->getModel('article', 'Article')->getItems();
//        diebug($articles);

        $navigation  = $this->getModel('page')->getPages(array('where' => 'page.page_id = 1', 'order' => 'page.ord'));
        $this->view->assign('navigation', $navigation);

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