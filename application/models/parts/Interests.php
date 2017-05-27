<?php

namespace application\models\parts;

use common\Database;
use PDO;

/**
 * Class Interests
 * @package application\models\parts
 */
class Interests extends Database
{
    const TABLE_NAME = 'interests';

    public function getByPersonId($personId)
    {
        $query = $this->getConnection()->prepare('SELECT * FROM ' . self::TABLE_NAME . " WHERE personid = :personId");
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
            ->prepare('INSERT INTO interests (data, icon, description) VALUES (:data, :icon, :description)');

        $rowsInserted = 0;
        foreach ($data as $row) {
            $query->bindParam(':data', $row['data'], PDO::PARAM_STR);
            $query->bindParam(':icon', $row['icon'], PDO::PARAM_STR);
            $query->bindParam(':description', $row['description'], PDO::PARAM_STR);
            if ($query->execute()) {
                $rowsInserted++;
            }
        }

        return $rowsInserted;
    }
}
