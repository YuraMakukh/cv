<?php

namespace administration\models\parts;

use PDO;

/**
 * Class Education
 * @package administration\models\parts
 */
class Education extends \application\models\parts\Education
{
    /**
     * @param int $educationId
     * @param array $data
     * @return bool
     */
    public function updateEducation($educationId, array $data)
    {
        $query = $this
            ->getConnection()
            ->prepare('
              UPDATE 
                education 
              SET
                period = :period,
                institution = :institution,
                specialty = :specialty,
                description = :description
              WHERE
                id = :educationId
            ');

        $query->bindParam(':period', $data['period']);
        $query->bindParam(':institution', $data['institution']);
        $query->bindParam(':specialty', $data['specialty']);
        $query->bindParam(':description', $data['description']);
        $query->bindParam(':educationId', $educationId, PDO::PARAM_INT);

        return $query->execute();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function createEducation($personId, array $data)
    {
        $query = $this
            ->getConnection()
            ->prepare('
               INSERT INTO education (
                person_id,
                period, 
                institution, 
                specialty, 
                description
              ) VALUES (
               :personId,
                :period, 
                :institution, 
                :specialty, 
                :description
              )
            ');

        $query->bindParam(':personId', $personId);
        $query->bindParam(':period', $data['period']);
        $query->bindParam(':institution', $data['institution']);
        $query->bindParam(':specialty', $data['specialty']);
        $query->bindParam(':description', $data['description']);

        return $query->execute();
    }

    /**
     * @param int $educationId
     * @return bool
     */
    public function deleteEducation($educationId)
    {
        $query = $this->getConnection()->prepare('DELETE FROM education WHERE id = :educationId LIMIT 1');
        $query->bindParam(':educationId', $educationId, PDO::PARAM_INT);

        return $query->execute();
    }
}
