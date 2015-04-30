<?php namespace App\Admin\Controllers;

class PageController extends AdminController {

    public function index()
    {
        $args = func_get_args();

        if ($id = (int)$args[0]) {
            unset($args[0]);
        }
//        debug($args);

        $book  = $this->model->getItem($id);
        $this->view->assign('title', $book->title);
        $this->view->display('admin/index.tpl');
        return;

//            $book  = $this->model->getItems(array('order' => 'title DESC', 'limit' => 3));
//            diebug($book->title);
    }

    public function edit()
    {
        diebug('to JE Admin');
    }

}