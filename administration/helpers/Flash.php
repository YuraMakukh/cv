<?php

namespace administration\helpers;

/**
 * Class Flash
 * @package application
 */
class Flash
{
    /**
     * @param string $key
     * @param mixed $message
     * @return bool
     */
    public static function set($key, $message)
    {
        $_SESSION[$key] = $message;
        return true;
    }

    /**
     * @param string $key
     * @param bool $clear
     * @return null|string
     */
    public static function get($key, $clear = true)
    {
        $message = null;
        if (self::hasKey($key)) {
            $message = $_SESSION[$key];
            if ($clear) {
                unset($_SESSION[$key]);
            }
        }

        return $message;
    }

    /**
     * @param string $key
     * @return bool
     */
    public static function hasKey($key)
    {
        return isset($_SESSION[$key]);
    }
}