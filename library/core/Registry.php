<?php

namespace Core;

/**
 * Class Registry
 *
 * @package core
 */
class Registry
{
    /**
     * Default data of project
     *
     * @var array
     */
    private static $_data = array();

    /**
     * Registry constructor private, for singleton class
     */
    private function __construct()
    {
    }

    /**
     * Clone private for singleton class
     */
    private function __clone()
    {
    }

    /**
     * Get data
     *
     * @param string $dataName data name
     * @return mixed|null data or null if not find
     */
    public static function get($dataName)
    {
        if (isset(self::$_data[$dataName])) {
            return self::$_data[$dataName];
        }

        return null;
    }

    /**
     * Set data
     *
     * @param string $name data name
     * @param mixed $data data
     */
    public static function set($name, $data)
    {
        self::$_data[$name] = $data;
    }
}