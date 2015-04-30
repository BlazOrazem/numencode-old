<?php namespace App\Core;

class Model extends Database {

    protected $tableName;

    public function __construct()
    {
        $this->setTableName();
    }

    public function getItem($id)
    {
        return $this->findOne($this->tableName, 'id = ?', [$id]);
    }

    public function getItems($criteria = array())
    {
        $query = isset($criteria['order']) ? " ORDER BY {$criteria['order']} " : null;
        $query .= isset($criteria['limit']) ? " LIMIT {$criteria['limit']} " : null;
        return $this->findAll($this->tableName, $query);
    }

    protected function setTableName()
    {
        $tableName = str_replace('App\Models\\', null, get_called_class());
        $tableName = str_replace('Model', null, $tableName);
        $this->tableName = strtolower($tableName);
        return $this;
    }

}
