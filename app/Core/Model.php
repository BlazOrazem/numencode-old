<?php namespace App\Core;

class Model extends Database {

    /** @var string Set the table name. */
    protected $tableName;

    /** @var bool Is table translatable. */
    protected $isTranslatable;

    public $url;

    /**
     * Create a new Model instance.
     */
    public function __construct()
    {
        $this->tableName = strtolower(str_replace('Model', null, substr(get_called_class(), strrpos(get_called_class(), '\\') + 1)));
        $this->isTranslatable = (bool)$this->exec("SHOW TABLES LIKE '{$this->tableName}_i18n'");
        $this->url = new Url();
    }

    /**
     * Return single item from requested table.
     *
     * @param $id Id of the item.
     * @param bool $debugSql If set to true, var_dump the SQL clause.
     * @return object
     */
    public function getItem($id, $debugSql = false)
    {
        $params = array(
            'where' => "{$this->tableName}.id = {$id}",
            'limit' => "1"
        );
        
        $items = $this->getItems($params, $debugSql);
        
        return reset($items);
    }

    /**
     * Return array ob items from requested table.
     *
     * @param array $params Parameters for SQL query.
     * @param bool $debugSql If set to true, var_dump the SQL clause.
     * @return array
     */
    public function getItems($params = array(), $debugSql = false)
    {
        if ($this->isTranslatable) {
            $sql = "SELECT translation.*, $this->tableName.* FROM $this->tableName AS $this->tableName
                LEFT JOIN {$this->tableName}_i18n AS translation
                ON ($this->tableName.id = translation.{$this->tableName}_id AND translation.lang_id = '{$_SESSION['lang']}')";
        } else {
            $sql = "SELECT * FROM {$this->tableName} AS {$this->tableName}";
        }

        $sql .= isset($params['where']) ? " WHERE {$params['where']} " : " WHERE 1=1 ";
        $sql .= isset($params['order']) ? " ORDER BY {$params['order']} " : null;
        $sql .= isset($params['limit']) ? " LIMIT {$params['limit']} " : null;

        if ($debugSql) {
            diebug($sql);
        }

        return $this->convertToBeans($this->tableName, $this->getAll($sql));
    }

}
