<?php

namespace application\models\parts;

use common\Database;
use PDO;

/**
 * Class Skills
 * @package application\models\parts
 */
class Skills extends Database
{
    const TABLE_NAME = 'skills';

    public function getByPersonId($personId)
    {
        $query = $this->getConnection()->prepare('SELECT * FROM '. self::TABLE_NAME . " WHERE person_id=:personId");
        $query->execute([":personId" => $personId]);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function get()
    {
        $query = $this->getConnection()->prepare('SELECT * FROM skills ');
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
            ->prepare('INSERT INTO skills (data, level) VALUES (:data, :level)');

        $rowsInserted = 0;
        foreach ($data as $row) {
            $query->bindParam(':data', $row['data'], PDO::PARAM_STR);
            $query->bindParam(':level', $row['level'], PDO::PARAM_INT);
            if ($query->execute()) {
                $rowsInserted++;
            }
        }

        return $rowsInserted;
    }
}
