<?php

define('BASE_PATH', __DIR__);
session_start();

require_once(__DIR__ . '/Autoload.php');
spl_autoload_register(['Autoload', 'loader']);

use common\Config;
use common\Router;
use administration\controllers\IndexController as AdminIndexController;
use application\controllers\IndexController as ApplicationIndexController;

$config = require_once(__DIR__ . '/configs/web.php');
Config::getInstance()->load($config);

try {
    $controller = Router::getInstance()->getController();
    $action = Router::getInstance()->getAction();

    if (class_exists($controller)) {
        $object = new $controller();
        if (method_exists($object, $action)) {
            echo $object->$action(Router::getInstance()->getParameters());
            exit;
        }
    }

    $indexController = Router::getInstance()->isAdmin() ? new AdminIndexController() : new ApplicationIndexController();
    echo $indexController->action404();
    exit;
} catch (Exception $ex) {
    die($ex->getMessage());
}
