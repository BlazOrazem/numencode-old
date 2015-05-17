<?php namespace App\Models;

use App\Core\Model;

class PageModel extends Model {

    /**
     * Return pages.
     *
     * @param array $params
     * @return array
     */
    public function getPages($params = array())
    {
        $pages = $this->getItems($params);

        foreach ($pages as &$page) {
            $page['slug'] = $this->url->returnSlug('page', 'index', $page->id);
        }

        return $pages;
    }

}
