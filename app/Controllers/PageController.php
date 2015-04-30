<?php namespace App\Controllers;

use App\Core\Controller;

class PageController extends Controller {

    public function index()
    {
        $args = func_get_args();

        if ($id = (int)$args[0]) {
            unset($args[0]);
        }

        $book  = $this->model->getItem($id);
        $this->view->assign('title', $book->title);
        $this->view->display('index.tpl');
        return;

//            $book  = $this->model->getItems(array('order' => 'title DESC', 'limit' => 3));
//            diebug($book->title);
    }

}
