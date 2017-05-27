<?php

namespace application\models\cv;

use application\models\AbstractBaseModel;

/**
 * Class Skills
 * @package application\models\cv
 */
class Skills extends AbstractBaseModel
{
    /**
     * @return array
     */
    public function getAll()
    {
        return $this->getValues();
    }
}
