<?php

class Autoload
{
    /**
     * @param string $className
     * @return bool
     */
    public static function loader($className)
    {
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $className) . ".php";
        if (file_exists($fileName)) {
            include($fileName);
            if (class_exists($className)) {
                return true;
            }
        }

        return false;
    }
}
