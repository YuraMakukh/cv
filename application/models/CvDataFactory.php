<?php

namespace application\models;

use common\Model;
use application\models\parts\Education;
use application\models\parts\Interests;
use application\models\parts\Experience;
use application\models\parts\Skills;
use application\models\parts\Personal;
use function print_r;

/**
 * Class CvFactory
 */
class CvDataFactory
{
    const PART_EDUCATION = 'education';
    const PART_EXPERIENCE = 'experience';
    const PART_INTERESTS = 'interests';
    const PART_PERSONAL = 'personal';
    const PART_SKILLS = 'skills';

    /**
     * @var array
     */
    private $data = [];

    public function __construct($personId)
    {
        $this->personId =$personId;
    }

    public function getPersonId()
    {
        return$this->personId;
    }

    /**
     * @return \application\models\cv\Personal
     */
    public function getPersonal()
    {
        if (!isset($this->data[self::PART_PERSONAL])) {
            $data = Model::populateModel('\application\models\cv\Personal', (new Personal())->getByPersonId($this->personId));
            $this->data[self::PART_PERSONAL] = $data;
        }

        return $this->data[self::PART_PERSONAL];
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function getSkills()
    {
        if (!isset($this->data[self::PART_SKILLS])) {
            /** @var \application\models\cv\Skills $data */
            $data = Model::populateModel('\application\models\cv\Skills', (new Skills())->getByPersonId($this->personId));
            $this->data[self::PART_SKILLS] = $data->getAll();
        }

        return $this->data[self::PART_SKILLS];
    }

    /**
     * @return \application\models\cv\Experience[]
     */
    public function getExperience()
    {
        if (!isset($this->data[self::PART_EXPERIENCE])) {
            $data = Model::populateModels('\application\models\cv\Experience', (new Experience())->getByPersonId($this->personId));
            $this->data[self::PART_EXPERIENCE] = $data;
        }

        return $this->data[self::PART_EXPERIENCE];
    }

    /**
     * @return \application\models\cv\Education[]
     */
    public function getEducation()
    {
        if (!isset($this->data[self::PART_EDUCATION])) {
            $data = Model::populateModels('\application\models\cv\Education', (new Education())->getByPersonId($this->personId));
            $this->data[self::PART_EDUCATION] = $data;
        }

        return $this->data[self::PART_EDUCATION];
    }

    /**
     * @return \application\models\cv\Interests[]
     */
    public function getInterests()
    {
        if (!isset($this->data[self::PART_INTERESTS])) {
            $data = Model::populateModels('\application\models\cv\Interests', (new Interests())->getByPersonId($this->personId));
            $this->data[self::PART_INTERESTS] = $data;
        }

        return $this->data[self::PART_INTERESTS];
    }
}
