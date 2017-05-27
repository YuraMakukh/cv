<?php

namespace application\models\parts;

use common\Database;
use PDO;

/**
 * Class Experience
 * @package application\models\parts
 */
class Experience extends Database
{
    const TABLE_NAME = 'experience';

    public function getByPersonId($personId)
    {
        $query = $this->getConnection()->prepare('SELECT * FROM ' . self::TABLE_NAME . " WHERE person_id=:personId");
        $query->execute([":personId" => $personId]);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return mixed
     * @throws \Exception
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
              INSERT INTO experience 
                (period, company, position, description) VALUES 
                (:period, :company, :position, :description)
            ');

        $rowsInserted = 0;
        foreach ($data as $row) {
            $query->bindParam(':period', $row['period'], PDO::PARAM_STR);
            $query->bindParam(':company', $row['company'], PDO::PARAM_STR);
            $query->bindParam(':position', $row['position'], PDO::PARAM_STR);
            $query->bindParam(':description', $row['description'], PDO::PARAM_STR);
            if ($query->execute()) {
                $rowsInserted++;
            }
        }

        return $rowsInserted;
    }
}
