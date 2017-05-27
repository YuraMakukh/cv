<?php

namespace administration\controllers;

use administration\Controller;
use administration\helpers\Flash;
use administration\models\parts\Experience;
use application\models\CvDataFactory;

/**
 * Class ExperienceController
 * @package administration\controllers
 */
class ExperienceController extends Controller
{
    /**
     * @return string
     * @throws \Exception
     */
    public function actionIndex()
    {
        return $this->getView()->render('parts/experience', [
            'active' => 'experience',
            'title' => 'My experience',
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
            $this->redirect('/experience');
        }

        $result = (new Experience())->updateExperience($parameters['id'], $_POST);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Experience was updated' : 'Experience was not updated';
        Flash::set($status, $message);

        $this->redirect('/experience');
    }

    public function actionAdd($params)
    {
        $result = (new Experience())->createExperience($params['person_id'], $_POST);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Experience was created' : 'Experience was not created';
        Flash::set($status, $message);

        $this->redirect('/experience');
    }

    /**
     * @param array $parameters
     */
    public function actionDelete(array $parameters)
    {
        if (!isset($parameters['id'])) {
            Flash::set('error', 'Required parameters are not exists');
            $this->redirect('/experience');
        }

        $result = (new Experience())->deleteExperience($parameters['id']);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Experience was deleted' : 'Experience was not deleted';
        Flash::set($status, $message);

        $this->redirect('/experience');
    }
}
