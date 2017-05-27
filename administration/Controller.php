<?php

namespace administration;

use administration\models\User;
use common\Config;
use common\Template;

/**
 * Class Controller
 * @package administration
 */
class Controller extends \common\Controller
{
    public function __construct()
    {
        $this->view = new Template();
        $this->view->setTemplatesDirectory(Config::getInstance()->get('adminTemplatesPath'));
        $this->view->setLayout('layouts/main');

        $this->user = new User();
        if ($this->user->isGuest() && false === $this->user->isAuthRequest() && false === $this->user->isRegisterRequest()) {
            echo $this->view->setLayout('layouts/empty')->render('index/login', ['title' => 'Log in']);
            exit;
        }

    }

    /**
     * @return Template|null
     */
    public function getView()
    {
        return $this->view;
    }
}
