<?php

namespace administration\models;

/**
 * Class CvPartsFactory
 * @package administration\models
 */
class CvPartsFactory extends \application\models\cv\CvPartsFactory
{
    /**
     * @param array $data
     * @return int
     */
    public function updateEducation($data)
    {
        return $this->dataModel->set(parent::PART_EDUCATION, $data);
    }

    /**
     * @param array $data
     * @return int
     */
    public function updateExperience($data)
    {
        return $this->dataModel->set(parent::PART_EXPERIENCE, $data);
    }

    /**
     * @param array $data
     * @return int
     */
    public function updateInterests($data)
    {
        return $this->dataModel->set(parent::PART_INTERESTS, $data);
    }

    /**
     * @param array $data
     * @return int
     */
    public function updatePersonal($data)
    {
        return $this->dataModel->set(parent::PART_PERSONAL, $data);
    }

    /**
     * @param array $data
     * @return int
     */
    public function updateSkills($data)
    {
        return $this->dataModel->set(parent::PART_SKILLS, $data);
    }
}
