<?php namespace App\Core;

class Model extends Database {

    protected $tableName;
    protected $isTranslatable;

    public function __construct()
    {
        $this->tableName = $this->setTableName();
        $this->isTranslatable = $this->isModelTranslatable();
    }

    public function getItem($id, $debugSql = false)
    {
        $params = array(
            'where' => "{$this->tableName}.id = {$id}",
            'limit' => "1"
        );
        
        $items = $this->getItems($params, $debugSql);
        
        return reset($items);
    }

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

    protected function setTableName()
    {
        $tableName = str_replace('App\Models\\', null, get_called_class());
        $tableName = str_replace('Model', null, $tableName);
        return strtolower($tableName);
    }

    protected function isModelTranslatable()
    {
        return (bool)$this->exec("SHOW TABLES LIKE '{$this->tableName}_i18n'");
    }

}
