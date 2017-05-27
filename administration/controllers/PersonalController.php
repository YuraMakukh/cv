<?php

namespace administration\controllers;

use administration\Controller;
use administration\helpers\Data;
use administration\helpers\Flash;
use administration\models\parts\Personal;
use administration\models\parts\personal\Addresses;
use administration\models\parts\personal\Emails;
use administration\models\parts\personal\Phones;
use application\models\CvDataFactory;

/**
 * Class PersonalController
 * @package administration\controllers
 */
class PersonalController extends Controller
{
    /**
     * @return string
     * @throws \Exception
     */
    public function actionIndex()
    {
        return $this->getView()->render('parts/personal', [
            'active' => 'personal',
            'title' => 'My personal information',
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
            $this->redirect('/personal');
        }

        $data = $_POST;
        if (isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name'])) {
            $data['photo'] = Data::uploadFile($_FILES['photo']);
        }

        $result = (new Personal())->updatePersonalInfo($parameters['id'], $data);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Personal data was updated' : 'Personal data was not updated';
        Flash::set($status, $message);

        $this->redirect('/personal');
    }

    /**
     * @param array $parameters (item "phone-id" is required)
     */
    public function actionUpdatePhone(array $parameters)
    {
        if (!isset($parameters['phone-id'])) {
            Flash::set('error', 'Required parameters are not exists');
            $this->redirect('/personal');
        }

        $result = (new Phones())->updatePhone($parameters['phone-id'], $_POST);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Phone was updated' : 'Phone was not updated';
        Flash::set($status, $message);

        $this->redirect('/personal');
    }

    /**
     * @param array $parameters (item "phone-id" is required)
     */
    public function actionDeletePhone(array $parameters)
    {
        if (!isset($parameters['phone-id'])) {
            Flash::set('error', 'Required parameters are not exists');
            $this->redirect('/personal');
        }

        $result = (new Phones())->deletePhone($parameters['phone-id']);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Phone was deleted' : 'Phone was not deleted';
        Flash::set($status, $message);

        $this->redirect('/personal');
    }

    /**
     * @param array $parameters (item "person-id" is required)
     */
    public function actionAddPhone(array $parameters)
    {
        if (!isset($parameters['person-id'])) {
            Flash::set('error', 'Required parameters are not exists');
            $this->redirect('/personal');
        }

        $result = (new Phones())->createPhone($parameters['person-id'], $_POST);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Phone was created' : 'Phone was not created';
        Flash::set($status, $message);

        $this->redirect('/personal');
    }

    /**
     * @param array $parameters (item "email-id" is required)
     */
    public function actionUpdateEmail(array $parameters)
    {
        if (!isset($parameters['email-id'])) {
            Flash::set('error', 'Required parameters are not exists');
            $this->redirect('/personal');
        }

        $result = (new Emails())->updateEmail($parameters['email-id'], $_POST);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Email was updated' : 'Email was not updated';
        Flash::set($status, $message);

        $this->redirect('/personal');
    }

    /**
     * @param array $parameters (item "email-id" is required)
     */
    public function actionDeleteEmail(array $parameters)
    {
        if (!isset($parameters['email-id'])) {
            Flash::set('error', 'Required parameters are not exists');
            $this->redirect('/personal');
        }

        $result = (new Emails())->deleteEmail($parameters['email-id']);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Email was deleted' : 'Email was not deleted';
        Flash::set($status, $message);

        $this->redirect('/personal');
    }

    /**
     * @param array $parameters (item "person-id" is required)
     */
    public function actionAddEmail(array $parameters)
    {
        if (!isset($parameters['person-id'])) {
            Flash::set('error', 'Required parameters are not exists');
            $this->redirect('/personal');
        }

        $result = (new Emails())->createEmail($parameters['person-id'], $_POST);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Phone was created' : 'Phone was not created';
        Flash::set($status, $message);

        $this->redirect('/personal');
    }

    /**
     * @param array $parameters (item "address-id" is required)
     */
    public function actionUpdateAddress(array $parameters)
    {
        if (!isset($parameters['address-id'])) {
            Flash::set('error', 'Required parameters are not exists');
            $this->redirect('/personal');
        }

        $result = (new Addresses())->updateAddress($parameters['address-id'], $_POST);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Address was updated' : 'Address was not updated';
        Flash::set($status, $message);

        $this->redirect('/personal');
    }

    /**
     * @param array $parameters (item "address-id" is required)
     */
    public function actionDeleteAddress(array $parameters)
    {
        if (!isset($parameters['address-id'])) {
            Flash::set('error', 'Required parameters are not exists');
            $this->redirect('/personal');
        }

        $result = (new Addresses())->deleteAddress($parameters['address-id']);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Address was deleted' : 'Address was not deleted';
        Flash::set($status, $message);

        $this->redirect('/personal');
    }

    /**
     * @param array $parameters (item "person-id" is required)
     */
    public function actionAddAddress(array $parameters)
    {
        if (!isset($parameters['person-id'])) {
            Flash::set('error', 'Required parameters are not exists');
            $this->redirect('/personal');
        }

        $result = (new Addresses())->createAddress($parameters['person-id'], $_POST);

        $status = $result ? 'success' : 'error';
        $message = $result ? 'Address was created' : 'Address was not created';
        Flash::set($status, $message);

        $this->redirect('/personal');
    }
}
