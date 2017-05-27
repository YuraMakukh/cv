<?php

namespace common;

/**
 * Class Controller
 * @package administration
 */
class Controller
{
    /**
     * @var null}Template
     */
    protected $view = null;

    /**
     * @param string $url
     * @param int $status
     */
    public function redirect($url, $status = 301)
    {
        if (substr($url, 0, 1) == '/') {
            $url = '/' . Router::getInstance()->getRoutMarker() . '/' . trim($url, " \t\n\r\0\x0B/");
        }
        
        header("Location: {$url}", true, $status);
        exit;
    }
}
