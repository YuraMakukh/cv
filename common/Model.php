<?php

namespace common;

/**
 * Class Model
 * @package common
 */
class Model
{
    /**
     * @param string $model
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public static function populateModel($model, array $data)
    {
        if (class_exists($model)) {
            return new $model($data);
        }

        throw new \Exception("Model '{$model}' is not exists");
    }

    /**
     * @param string $model
     * @param array $data
     * @return array
     * @throws \Exception
     */
    public static function populateModels($model, array $data)
    {
        $result = [];
        foreach ($data as $row) {
            $result[] = self::populateModel($model, $row);
        }

        return $result;
    }
}
