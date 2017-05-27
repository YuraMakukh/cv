<?php

namespace administration\models\parts\personal;

use PDO;
use administration\models\parts\Personal;

/**
 * Class Phones
 * @package administration\models\parts\personal
 */
class Phones extends Personal
{
    /**
     * @param int $phoneId
     * @param array $data
     * @return bool
     */
    public function updatePhone($phoneId, array $data)
    {
        $query = $this->getConnection()->prepare('
          UPDATE 
            `phones` 
          SET 
            `data` = :data,
            `description` = :description
          WHERE 
            `id` = :phoneId
        ');

        $query->bindParam(':data', $data['data']);
        $query->bindParam(':description', $data['description']);
        $query->bindParam(':phoneId', $phoneId, PDO::PARAM_INT);

        return $query->execute();
    }

    /**
     * @param int $phoneId
     * @return bool
     */
    public function deletePhone($phoneId)
    {
        $query = $this->getConnection()->prepare('DELETE FROM `phones` WHERE `id` = :phoneId');
        $query->bindParam(':phoneId', $phoneId, PDO::PARAM_INT);

        return $query->execute();
    }

    /**
     * @param int $personId
     * @param array $data
     * @return bool
     */
    public function createPhone($personId, array $data)
    {
        $query = $this
            ->getConnection()
            ->prepare('
              INSERT INTO `phones` (
                `person_id`, `data`, `description`
              ) VALUES (
                :personId, :phone, :description
              )
            ');

        $query->bindParam(':personId', $personId, PDO::PARAM_INT);
        $query->bindParam(':phone', $data['data']);
        $query->bindParam(':description', $data['description']);

        return $query->execute();
    }
}

