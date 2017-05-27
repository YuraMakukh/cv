<?php

namespace common;

/**
 * Class Config
 * @package application
 */
class Config
{
    /**
     * @var array
     */
    private $config = [];

    /**
     * @var null|Config
     */
    private static $instance = null;

    private function __construct()
    {
    }

    /**
     * @return Config
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function load(array $data)
    {
        $this->config = array_merge($this->config, $data);
        return $this;
    }

    /**
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return isset($this->config[$key]) ? $this->config[$key] : $default;
    }
}