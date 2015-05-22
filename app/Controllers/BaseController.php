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
        $pageMenu  = $this->getModel('page')->getPages(array('where' => 'page.page_id = 1', 'order' => 'page.ord'));
        $this->view->assign('pageMenu', $pageMenu);

        $navigation = $this->view->fetch('navigation.tpl');
        $this->view->assign('navigation', $navigation);
    }

    public function includeFooter()
    {
        $this->view->assign('copyright', 'NumenCode');

        $footer = $this->view->fetch('footer.tpl');
        $this->view->assign('footer', $footer);
    }

}