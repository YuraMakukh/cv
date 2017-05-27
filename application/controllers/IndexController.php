<?php

namespace application\controllers;

use application\Controller;
use application\models\CvDataFactory;

/**
 * Class IndexController
 * @package application\controllers
 */
class IndexController extends Controller
{
    /**
     * @return string
     * @throws \Exception
     */
    public function actionIndex()
    {
        return $this->getView()->render('index/index', [
            'parts' => new CvDataFactory()
        ]);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function action404()
    {
        return $this->getView()->render('index/404');
    }
}