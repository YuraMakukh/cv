<?php

namespace administration\models\parts\personal;

use PDO;
use administration\models\parts\Personal;

/**
 * Class Emails
 * @package administration\models\parts\personal
 */
class Emails extends Personal
{
    /**
     * @param int $emailId
     * @param array $data
     * @return bool
     */
    public function updateEmail($emailId, array $data)
    {
        $query = $this->getConnection()->prepare('
          UPDATE 
            `emails` 
          SET 
            `data` = :data,
            `description` = :description
          WHERE 
            `id` = :emailId
        ');

        $query->bindParam(':data', $data['data']);
        $query->bindParam(':description', $data['description']);
        $query->bindParam(':emailId', $emailId, PDO::PARAM_INT);

        return $query->execute();
    }

    /**
     * @param int $emailId
     * @return bool
     */
    public function deleteEmail($emailId)
    {
        $query = $this->getConnection()->prepare('DELETE FROM `emails` WHERE `id` = :emailId');
        $query->bindParam(':emailId', $emailId, PDO::PARAM_INT);

        return $query->execute();
    }

    /**
     * @param int $personId
     * @param array $data
     * @return bool
     */
    public function createEmail($personId, array $data)
    {
        $query = $this
            ->getConnection()
            ->prepare('
              INSERT INTO `emails` (
                `person_id`, `data`, `description`
              ) VALUES (
                :personId, :email, :description
              )
            ');

        $query->bindParam(':personId', $personId, PDO::PARAM_INT);
        $query->bindParam(':email', $data['data']);
        $query->bindParam(':description', $data['description']);

        return $query->execute();
    }
}

