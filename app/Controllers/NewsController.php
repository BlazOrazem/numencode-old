<?php namespace App\Controllers;

class NewsController extends BaseController {

    public function index()
    {
        $id = isset(func_get_args()[0]) ? (int)func_get_args()[0] : false;
        $item  = $this->model->getItem($id);

        $this->view->assign('item', $item);
        $this->view->display('article/index.tpl');
    }

}
