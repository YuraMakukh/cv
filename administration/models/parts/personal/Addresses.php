<?php

namespace administration\models\parts\personal;

use PDO;
use administration\models\parts\Personal;

/**
 * Class Addresses
 * @package administration\models\parts\personal
 */
class Addresses extends Personal
{
    /**
     * @param int $addressId
     * @param array $data
     * @return bool
     */
    public function updateAddress($addressId, array $data)
    {
        $query = $this->getConnection()->prepare('
          UPDATE 
            `addresses` 
          SET 
            `data` = :data,
            `description` = :description
          WHERE 
            `id` = :addressId
        ');

        $query->bindParam(':data', $data['data']);
        $query->bindParam(':description', $data['description']);
        $query->bindParam(':addressId', $addressId, PDO::PARAM_INT);

        return $query->execute();
    }

    /**
     * @param int $addressId
     * @return bool
     */
    public function deleteAddress($addressId)
    {
        $query = $this->getConnection()->prepare('DELETE FROM `addresses` WHERE `id` = :addressId');
        $query->bindParam(':addressId', $addressId, PDO::PARAM_INT);

        return $query->execute();
    }

    /**
     * @param int $personId
     * @param array $data
     * @return bool
     */
    public function createAddress($personId, array $data)
    {
        $query = $this
            ->getConnection()
            ->prepare('
              INSERT INTO `addresses` (
                `person_id`, `data`, `description`
              ) VALUES (
                :personId, :address, :description
              )
            ');

        $query->bindParam(':personId', $personId, PDO::PARAM_INT);
        $query->bindParam(':address', $data['data']);
        $query->bindParam(':description', $data['description']);

        return $query->execute();
    }
}

