<?php

namespace application\models\cv;

use application\models\AbstractBaseModel;

/**
 * Class Education
 * @package application\models\cv
 */
class Education extends AbstractBaseModel
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
    public function getInstitution()
    {
        return $this->getValue('institution');
    }

    /**
     * @return null|string
     */
    public function getSpecialty()
    {
        return $this->getValue('specialty');
    }

    /**
     * @return string|null
     */
    public function getDescription()
    {
        return $this->getValue('description');
    }
}
