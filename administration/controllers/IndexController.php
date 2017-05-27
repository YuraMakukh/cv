<?php

namespace administration\controllers;

use administration\Controller;
use administration\helpers\Flash;
use administration\models\User;
use application\models\CvDataFactory;

/**
 * Class IndexController
 * @package administration\controllers
 */
class IndexController extends Controller
{
    public function actionIndex()
    {
        return $this->getView()->render('index/dashboard', [
            'active' => 'dashboard',
            'title' => 'Dashboard&nbsp;&nbsp;&nbsp;&nbsp;<a terget = _blank href="/show/cv/personId/'.$this->user->getCurrentPersonId().'">Your public CV Link</a>',
            'parts' => new CvDataFactory($this->user->getCurrentPersonId())
        ]);
    }

    public function actionRegister()
    {
        if (!isset($_POST['login']) || !isset($_POST['password']) || !isset($_POST['name'])) {
            Flash::set('error', 'Name, login and password are required');
        } else {
            if($this->user->addUser($_POST['login'], $_POST['password'], $_POST['name'])){
                Flash::set('success', 'Registration OK');
            } else {
                Flash::set('error', 'Registration failed');
            }
        }
        $this->redirect('/');
    }

    public function actionAuth()
    {
        if (!isset($_POST['login']) || !isset($_POST['password'])) {
            Flash::set('error', 'Login and password are required');
        } else {
            $user = new User();
            if (false === $user->login($_POST['login'], $_POST['password'])) {
                Flash::set('error', 'Login or password is not correct');
            }
        }

        $this->redirect('/');
    }
    
    public function actionLogout()
    {
        (new User())->logout();
        $this->redirect('/');
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function action404()
    {
        return $this->getView()->render('index/404', ['title' => 'Page not found']);
    }
}
