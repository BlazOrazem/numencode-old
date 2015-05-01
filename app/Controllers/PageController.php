<?php namespace App\Controllers;

use App\Core\BaseController;

class PageController extends BaseController {

    public function index()
    {
        $args = func_get_args();

        if ($id = (int)$args[0]) {
            unset($args[0]);
        }

        $item  = $this->model->getItem($id);
        $this->view->assign('item', $item);
//        $this->view->render(array($item));

//        $articles  = $this->getModel('article')->getItems();
//        diebug($articles);

        $this->view->display('page/index.tpl');

//        $content = $this->view->fetch('page/index.tpl');
//        $this->view->assign('_content', $content);

//        return;

//            $book  = $this->model->getItems(array('order' => 'title DESC', 'limit' => 3));
//            diebug($book->title);
    }

}
