<?php

namespace administration\models\parts;

use PDO;

/**
 * Class Interests
 * @package administration\models\parts
 */
class Interests extends \application\models\parts\Interests
{
    /**
     * @param int $interestId
     * @param array $data
     * @return bool
     */
    public function updateInterest($interestId, array $data)
    {
        $query = $this
            ->getConnection()
            ->prepare('
              UPDATE 
                interests 
              SET 
                data = :name, 
                icon = :icon, 
                description = :description 
              WHERE 
                id = :interestId
            ');

        $query->bindParam(':name', $data['data']);
        $query->bindParam(':icon', $data['icon']);
        $query->bindParam(':description', $data['description']);
        $query->bindParam(':interestId', $interestId, PDO::PARAM_INT);

        return $query->execute();
    }

    /**
     * @param int $interestId
     * @return bool
     */
    public function deleteInterest($interestId)
    {
        $query = $this->getConnection()->prepare('DELETE FROM interests WHERE id = :interestId LIMIT 1');
        $query->bindParam(':interestId', $interestId, PDO::PARAM_INT);

        return $query->execute();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function createInterest($personId, array $data)
    {
        $query = $this->getConnection()->prepare('
          INSERT INTO interests (
            person_id,
            data, 
            icon, 
            description
          ) VALUES (
            :personId,
            :name, 
            :icon, 
            :description
          )
        ');
        $query->bindParam(':personId', $personId);
        $query->bindParam(':name', $data['data']);
        $query->bindParam(':icon', $data['icon']);
        $query->bindParam(':description', $data['description']);

        return $query->execute();
    }
}
