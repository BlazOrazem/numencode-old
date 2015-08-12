<?php namespace App\Core;

use Illuminate\Database\Eloquent\Model as Model;

//class Url extends Illuminate\Database\Eloquent\Model {
//    public $timestamps = false;
//}
class Url extends Model {

    protected $table = 'url';
    public $timestamps = false;

    /**
     * Create a new Url instance.
     */
    public function __construct()
    {

    }

    /**
     * Return a slug from database if exists else assemble it.
     *
     * @return null|string
     */
    public function returnSlug()
    {
        $urlData = func_get_args();

        $sql = "SELECT slug FROM url WHERE controller = :controller AND method = :method ";
        $params = array(
            'controller' => $urlData[0],
            'method' => $urlData[1],
        );

        if (isset($urlData[2]) && $urlData[2] != 'null') {
            $sql .= " AND id = :id ";
            $params = array_merge($params, array('id' => (int)$urlData[2]));
        }

        $slug = $this->getCell($sql, $params);

        return empty($slug) ? $this->assembleSlug($urlData) : '/' . $slug;
    }

    /**
     * Assemble a slug from given parameters.
     *
     * @param $urlData
     * @return null|string
     */
    protected function assembleSlug($urlData)
    {
        $slug = isset($urlData[3]) ? $urlData[3] . '/' : null;
        $slug .= $urlData[0] . '/';
        $slug .= $urlData[1] . '/';
        $slug .= isset($urlData[2]) ? (int)$urlData[2] . '/' : null;
        return ('/' . $slug);
    }

}
