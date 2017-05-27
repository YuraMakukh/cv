<?php

namespace application\models\cv;

use application\models\AbstractBaseModel;

/**
 * Class Experience
 * @package application\models\cv
 */
class Experience extends AbstractBaseModel
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
    public function getPeriod()
    {
        return $this->getValue('period');
    }

    /**
     * @return null|string
     */
    public function getCompany()
    {
        return $this->getValue('company');
    }

    /**
     * @return null|string
     */
    public function getPosition()
    {
        return $this->getValue('position');
    }

    /**
     * @return null|string
     */
    public function getDescription()
    {
        return $this->getValue('description');
    }
}
