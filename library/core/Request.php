<?php

namespace Core;

/**
 * Class Request
 *
 * @package core
 */
class Request
{
    /**
     * Parameters
     *
     * @var null|string
     */
    public $param = null;

    /**
     * Request headers
     *
     * @var string
     */
    public $headers = null;

    /**
     * Global variable _GET
     *
     * @var array
     */
    public $get = null;

    /**
     * Global variable _POST
     *
     * @var array
     */
    public $post = null;

    /**
     * Request constructor set all request data to class property's
     *
     * @param array $param request options
     */
    public function __construct($param)
    {
        $this->param = $param;
        $this->headers = getallheaders();
        $this->get = $_GET;
        $this->post = $_POST;
    }
}