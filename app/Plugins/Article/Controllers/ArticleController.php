<?php namespace App\Plugins\Article\Controllers;

use App\Core\BaseController;

class ArticleController extends BaseController {

    public function index()
    {
        // TODO: handle model for request http://www.numencode.app/plugins/article/article/index/2
        $id = isset(func_get_args()[0]) ? (int)func_get_args()[0] : false;
        $item  = $this->model->getItem($id);

        $this->view->assign('item', $item);
        $this->view->display('article/index.tpl');
    }

}
