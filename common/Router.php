<?php

namespace common;

/**
 * Class Router
 * @package common
 */
class Router
{
    /**
     * @var null|string
     */
    private $controller = null;

    /**
     * @var array
     */
    private $pathParts = [];

    /**
     * @var string
     */
    private $routMarker = 'admin';

    /**
     * @var bool
     */
    private $isAdmin = false;

    /**
     * Router constructor.
     */
    private function __construct()
    {
        $rout = trim($_SERVER['REQUEST_URI'], " \t\n\r\0\x0B/");
        $this->isAdmin = false !== stripos($rout, $this->routMarker);
        $rout = ltrim(preg_replace("/^{$this->routMarker}/", '', $rout), '/');

        $this->pathParts = explode('/', $rout);
    }

    /**
     * @var null|Router
     */
    private static $instance = null;

    /**
     * @return Router|null
     */
    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * @return null|string
     */
    public function getController()
    {
        if (null === $this->controller) {
            $this->prepareController();
        }

        return $this->controller;
    }

    private function prepareController()
    {
        $this->controller = array_shift($this->pathParts) ?: 'index';
        $parts = array_merge(explode('-', $this->controller), ['Controller']);


        $this->controller = '\\' . ($this->isAdmin ? 'administration' : 'application') . '\controllers\\';
        foreach ($parts as $part) {
            $this->controller .= ucfirst(strtolower($part));
        }
    }

    /**
     * @var null|string
     */
    private $action = null;

    /**
     * @return null|string
     */
    public function getAction()
    {
        if (null === $this->action) {
            $this->prepareAction();
        }

        return $this->action;
    }

    private function prepareAction()
    {
        $this->action = array_shift($this->pathParts) ?: 'index';
        $parts = explode('-', $this->action);

        $this->action = 'action';
        foreach ($parts as $part) {
            $this->action .= ucfirst(strtolower($part));
        }
    }

    /**
     * @var array|null
     */
    private $parameters = null;

    /**
     * @return array|null
     */
    public function getParameters()
    {
        if (null === $this->parameters) {
            $this->prepareParameters();
        }

        return $this->parameters;
    }

    private function prepareParameters()
    {
        $parameterPares = array_chunk($this->pathParts, 2);
        foreach ($parameterPares as $pare) {
            $this->parameters[$pare[0]] = isset($pare[1]) ? $pare[1] : null;
        }
    }

    /**
     * @return string
     */
    public function getRoutMarker()
    {
        return $this->routMarker;
    }
}
