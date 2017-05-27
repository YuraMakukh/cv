<?php

namespace application\models\parts;

use common\Database;
use PDO;

/**
 * Class Education
 * @package application\models\parts
 */
class Education extends Database
{
    const TABLE_NAME = 'education';

    public function getByPersonId($personId)
    {
        $query = $this->getConnection()->prepare('SELECT * FROM ' . self::TABLE_NAME . " WHERE person_id = :personId");
        $query->execute([":personId" => $personId]);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     */
    public function get()
    {
        $query = $this->getConnection()->prepare('SELECT * FROM ' . self::TABLE_NAME);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param array $data
     * @return int
     * @throws \Exception
     */
    public function set(array $data)
    {
        $this->clearTable(self::TABLE_NAME);
        $query = $this
            ->getConnection()
            ->prepare('
              INSERT INTO education 
                (period, institution, specialty, description) VALUES 
                (:period, :institution, :specialty, :description)
            ');

        $rowsInserted = 0;
        foreach ($data as $row) {
            $query->bindParam(':period', $row['period'], PDO::PARAM_STR);
            $query->bindParam(':institution', $row['institution'], PDO::PARAM_STR);
            $query->bindParam(':specialty', $row['specialty'], PDO::PARAM_STR);
            $query->bindParam(':description', $row['description'], PDO::PARAM_STR);
            if ($query->execute()) {
                $rowsInserted++;
            }
        }

        return $rowsInserted;
    }
}
