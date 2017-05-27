<?php

namespace administration\controllers;

use administration\Controller;
use administration\helpers\Flash;
use administration\models\parts\Skills;
use application\models\CvDataFactory;

/**
 * Class SkillsController
 * @package administration\controllers
 */
class SkillsController extends Controller
{
    /**
     * @return string
     * @throws \Exception
     */
    public function actionIndex()
    {
        return $this->getView()->render('parts/skills', [
            'active' => 'skills',
            'title' => 'My skills',
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
            $this->redirect('/skills');
        }

        $result = (new Skills())->updateSkill($parameters['id'], $_POST);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Skill was updated' : 'Skill was not updated';
        Flash::set($status, $message);

        $this->redirect('/skills');
    }

    /**
     * @param array $parameters (item "id" is required)
     */
    public function actionDelete(array $parameters)
    {
        if (!isset($parameters['id'])) {
            Flash::set('error', 'Required parameters are not exists');
            $this->redirect('/skills');
        }

        $result = (new Skills())->deleteSkill($parameters['id']);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Skill was deleted' : 'Skill was not deleted';
        Flash::set($status, $message);

        $this->redirect('/skills');
    }

    public function actionAdd($params)
    {
        $result = (new Skills())->createSkill($params['person_id'], $_POST);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Skill was created' : 'Skill was not created';
        Flash::set($status, $message);

        $this->redirect('/skills');
    }
}
