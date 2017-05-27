<?php

namespace application\models\cv;

use application\models\AbstractBaseModel;

/**
 * Class Personal
 * @package application\models\cv
 */
class Personal extends AbstractBaseModel
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
    public function getName()
    {
        return $this->getValue('name');
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
    public function getInformation()
    {
        return $this->getValue('about');
    }

    /**
     * @return array
     */
    public function getPhones()
    {
        return $this->getValue('phones', []);
    }

    /**
     * @return array
     */
    public function getEmails()
    {
        return $this->getValue('emails', []);
    }

    /**
     * @return array
     */
    public function getAddresses()
    {
        return $this->getValue('addresses', []);
    }

    /**
     * @return null|string
     */
    public function getPhoto()
    {
        return $this->getValue('photo');
    }
}
