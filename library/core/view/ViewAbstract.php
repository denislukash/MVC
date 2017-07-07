<?php

namespace Core\View;

/**
 * Class ViewAbstract
 *
 * @package core\view
 */
abstract class ViewAbstract
{
    /**
     * Data for render pages
     *
     * @var array
     */
    protected $_data = [];

    /**
     * Magic method for get data
     *
     * @param string $name data name
     * @return mixed data
     */
    public function __get($name)
    {
        if (isset($this->_data[$name])) {
            return $this->_data[$name];
        }
    }

    /**
     * Magic method for set data to view class
     *
     * @param string $name data name
     * @param mixed $value data
     */
    public function __set($name, $value)
    {
        $this->_data[$name] = $value;
    }

    /**
     * In depend of wanted file type return data
     *
     * @return mixed
     */
    abstract public function render();
}