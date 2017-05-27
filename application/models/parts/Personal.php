<?php

namespace application\models\parts;

use common\Database;
use PDO;

/**
 * Class Personal
 * @package application\models\parts
 */
class Personal extends Database
{
    const PERSONAL_TABLE_NAME = 'personal';
    const EMAILS_TABLE_NAME = 'emails';
    const PHONES_TABLE_NAME = 'phones';
    const ADDRESSES_TABLE_NAME = 'addresses';


    public function getByPersonId($personId)
    {
        $query = $this->getConnection()->prepare('SELECT * FROM ' . self::PERSONAL_TABLE_NAME . " WHERE id=:personId");
        $query->execute([":personId" => $personId]);

        $data = $query->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            $data['phones'] = $this->getPhones($data['id']);
            $data['emails'] = $this->getEmails($data['id']);
            $data['addresses'] = $this->getAddresses($data['id']);

            return $data;
        }

        return [];
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function get()
    {
        $query = $this->getConnection()->prepare('SELECT * FROM ' . self::PERSONAL_TABLE_NAME);
        $query->execute();

        $data = $query->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            $data['phones'] = $this->getPhones($data['id']);
            $data['emails'] = $this->getEmails($data['id']);
            $data['addresses'] = $this->getAddresses($data['id']);

            return $data;
        }

        return [];
    }

    /**
     * @param int $personId
     * @return array
     */
    private function getPhones($personId)
    {
        $query = $this
            ->getConnection()
            ->prepare('SELECT id, data, description FROM phones WHERE person_id = :person_id');
        $query->execute([':person_id' => $personId]);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param int $personId
     * @return array
     */
    private function getEmails($personId)
    {
        $query = $this
            ->getConnection()
            ->prepare('SELECT id, data, description FROM emails WHERE person_id = :person_id');
        $query->execute([':person_id' => $personId]);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param int $personId
     * @return array
     */
    private function getAddresses($personId)
    {
        $query = $this
            ->getConnection()
            ->prepare('SELECT id, data, description FROM addresses WHERE person_id = :person_id');

        $query->execute([':person_id' => $personId]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
