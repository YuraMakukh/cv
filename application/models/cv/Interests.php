<?php

namespace application\models\cv;

use application\models\AbstractBaseModel;

/**
 * Class Interests
 * @package application\models\cv
 */
class Interests extends AbstractBaseModel
{
    /**
     * @return null|int
     */
    public function getId()
    {
        return $this->getValue('id');
    }

    /**
     * @return null|string
     */
    public function getItem()
    {
        return $this->getValue('data');
    }

    /**
     * @return null|string
     */
    public function getIcon()
    {
        return $this->getValue('icon');
    }

    /**
     * @return null|string
     */
    public function getDescription()
    {
        return $this->getValue('description');
    }
}
