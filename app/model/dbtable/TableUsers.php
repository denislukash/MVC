<?php

namespace Application\Model\DbTable;
use Core\Db\Sql\Table;


/**
 * Class TableUsers
 * @package model\dbtable
 */
class TableUsers extends Table
{
    /**
     * Table name
     *
     * @var string
     */
    protected $_tableName = 'users';

    /**
     * Method for get all users data from database, default sorted by id
     *
     * @return array
     */
    public function getAllUsers()
    {
        return $this->fetchAll(null, 'id');
    }

    /**
     * Method for get sorted all users data from database
     *
     * @param string $column column name for sorting
     *
     * @return array
     */
    public function getSorted($column)
    {
        return $this->fetchAll(null, $column);
    }
}