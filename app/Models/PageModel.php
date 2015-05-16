<?php namespace App\Models;

use App\Core\Model;
use App\Core\Url;

class PageModel extends Model {

    public function getPages($params = array())
    {
        $pages = $this->getItems($params);

        foreach ($pages as &$page) {
            $page['slug'] = $this->url->returnSlug('page', 'index', $page->id);
        }

//        diebug($pages);
    }


}