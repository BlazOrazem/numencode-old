<?php namespace App\Models;

use App\Core\Model;
use App\Plugins\Article\Models\ArticleModel;

class PageModel extends Model {


    /**
     * Return single page with appended content.
     *
     * @param $id Page ID.
     * @return object
     */
    public function getItem($id)
    {
        $sql = "SELECT translation.*, page.*
                FROM page AS page
                LEFT JOIN page_i18n AS translation ON (page.id = translation.page_id
                AND translation.lang_id = :lang)
                WHERE page.id = :id";
        $page = $this->convertToBeans($this->tableName, array($this->getRow($sql, array('id' => $id, 'lang' => $_SESSION['lang']))));
        $page = reset($page);

        $sql = "SELECT content.*, translation.*, plugin.controller AS plugin_controller, plugin.method AS plugin_method
                FROM content AS content
                LEFT JOIN content_i18n AS translation ON (content.id = translation.content_id)
                LEFT JOIN plugin AS plugin ON (content.plugin_code = plugin.code)
                WHERE content.page_id = :id
                ORDER BY content.ord";
        $page['contents'] = $this->convertToBeans($this->tableName, $this->getAll($sql, array('id' => $id)));;

        foreach ($page['contents'] as &$content) {
            if ($content['plugin_code']) {
                $plugin = new ArticleModel();
                $content['plugin'] = $plugin->getItem($content['plugin_param']);
            }
        }

        return $page;
    }

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
