<?php

namespace administration\controllers;

use administration\Controller;
use administration\helpers\Flash;
use administration\models\parts\Interests;
use application\models\CvDataFactory;

/**
 * Class InterestsController
 * @package administration\controllers
 */
class InterestsController extends Controller
{
    /**
     * @return string
     * @throws \Exception
     */
    public function actionIndex()
    {
        return $this->getView()->render('parts/interests', [
            'active' => 'interests',
            'title' => 'My interests',
            'parts' => new CvDataFactory($this->user->getCurrentPersonId())
        ]);
    }

    /**
     * @param array $parameters (item "id" is required)
     */
    public function actionUpdate(array $parameters)
    {
        if (!isset($parameters['id'])) {
            Flash::set('error', 'Required parameters are not exists');
            $this->redirect('/interests');
        }

        $result = (new Interests())->updateInterest($parameters['id'], $_POST);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Interest was updated' : 'Interest was not updated';
        Flash::set($status, $message);

        $this->redirect('/interests');
    }

    /**
     * @param array $parameters (item "id" is required)
     */
    public function actionDelete(array $parameters)
    {
        if (!isset($parameters['id'])) {
            Flash::set('error', 'Required parameters are not exists');
            $this->redirect('/interests');
        }

        $result = (new Interests())->deleteInterest($parameters['id']);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Interest was deleted' : 'Interest was not deleted';
        Flash::set($status, $message);

        $this->redirect('/interests');
    }

    public function actionAdd($params)
    {
        $result = (new Interests())->createInterest($params['person_id'], $_POST);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Interest was created' : 'Interest was not created';
        Flash::set($status, $message);

        $this->redirect('/interests');
    }
}
