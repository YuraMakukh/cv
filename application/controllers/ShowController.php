<?php

namespace application\controllers;

use application\Controller;
use application\models\CvDataFactory;

/**
 * Class IndexController
 * @package application\controllers
 */
class ShowController extends Controller
{
	/**
	 * @return string
	 * @throws \Exception
	 */
	public function actionCv($params)
	{
		return $this->getView()->render('index/index', [
			'parts' => new CvDataFactory($params['personId'])
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