<?php

namespace administration\helpers;

use common\Config;

/**
 * Class Data
 * @package administration\helpers
 */
class Data
{
    /**
     * @param array $data
     * @return array
     */
    public static function prepareToSave(array $data)
    {
        $result = [];
        foreach ($data as $field => $value) {
            $result[$field] = is_array($value) ? self::clearItems($value) : $value;
        }

        return $result;
    }

    /**
     * @param array $items
     * @return array
     */
    private static function clearItems(array $items)
    {
        $result = [];
        foreach ($items as $item) {
            $row = array_filter($item, function ($value) { return $value !== ''; });
            if ($row) {
                $result[] = $row;
            }
        }

        return $result;
    }

    /**
     *
     * @param array $file
     * @return null|string
     */
    public static function uploadFile(array $file)
    {
        $fileName = md5(mt_rand()) . '-' . basename($file['name']);
        $filePath = Config::getInstance()->get('uploadsPath') . DIRECTORY_SEPARATOR . $fileName;
        $fileUrl = Config::getInstance()->get('uploadsUrl') . '/' . $fileName;

        return move_uploaded_file($file['tmp_name'], $filePath) ? $fileUrl : null;
    }
}
