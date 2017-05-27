<?php

namespace application;

use common\Config;
use common\Template;

/**
 * Class Controller
 * @package application
 */
class Controller extends \common\Controller
{
    /**
     * @return Template|null
     */
    public function getView()
    {
        $this->view = new Template();
        $this->view->setTemplatesDirectory(Config::getInstance()->get('templatesPath'));

        return $this->view->setLayout('layouts/main');
    }
}
