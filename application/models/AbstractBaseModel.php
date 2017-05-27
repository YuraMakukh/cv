<?php

namespace application\models;

/**
 * Class AbstractBaseModel
 * @package application\models
 */
abstract class AbstractBaseModel
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * AbstractBaseModel constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    protected function getValue($key, $default = null)
    {
        return isset($this->data[$key]) ? $this->data[$key] : $default;
    }

    /**
     * @return array
     */
    protected function getValues()
    {
        return $this->data;
    }
}
