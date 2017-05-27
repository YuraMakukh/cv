<?php

namespace administration\models\parts;

use PDO;

/**
 * Class Experience
 * @package administration\models\parts
 */
class Experience extends \application\models\parts\Experience
{
    /**
     * @param int $experienceId
     * @param array $data
     * @return bool
     */
    public function updateExperience($experienceId, array $data)
    {
        $query = $this
            ->getConnection()
            ->prepare('
              UPDATE 
                experience 
              SET
                period = :period,
                company = :company,
                position = :position,
                description = :description
              WHERE
                id = :experienceId
            ');

        $query->bindParam(':period', $data['period']);
        $query->bindParam(':company', $data['company']);
        $query->bindParam(':position', $data['position']);
        $query->bindParam(':description', $data['description']);
        $query->bindParam(':experienceId', $experienceId, PDO::PARAM_INT);

        return $query->execute();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function createExperience($personId, array $data)
    {
        $query = $this
            ->getConnection()
            ->prepare('
               INSERT INTO experience (
                person_id,
                period, 
                company, 
                position, 
                description
              ) VALUES (
               :person_id,
                :period, 
                :company, 
                :position, 
                :description
              )
            ');

        $query->bindParam(':person_id', $personId);
        $query->bindParam(':period', $data['period']);
        $query->bindParam(':company', $data['company']);
        $query->bindParam(':position', $data['position']);
        $query->bindParam(':description', $data['description']);

        return $query->execute();
    }

    /**
     * @param int $experienceId
     * @return bool
     */
    public function deleteExperience($experienceId)
    {
        $query = $this->getConnection()->prepare('DELETE FROM experience WHERE id = :experienceId LIMIT 1');
        $query->bindParam(':experienceId', $experienceId, PDO::PARAM_INT);

        return $query->execute();
    }
}
