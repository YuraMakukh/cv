<?php

namespace administration\models\parts;

use PDO;

/**
 * Class Skills
 * @package administration\models\parts
 */
class Skills extends \application\models\parts\Skills
{
    /**
     * @param int $skillId
     * @param array $data
     * @return bool
     */
    public function updateSkill($skillId, array $data)
    {
        $query = $this
            ->getConnection()
            ->prepare('UPDATE skills SET data = :skillName, level = :level WHERE id = :skillId');

        $query->bindParam(':skillName', $data['data']);
        $query->bindParam(':level', $data['level']);
        $query->bindParam(':skillId', $skillId, PDO::PARAM_INT);

        return $query->execute();
    }

    /**
     * @param int $skillId
     * @return bool
     */
    public function deleteSkill($skillId)
    {
        $query = $this->getConnection()->prepare('DELETE FROM skills WHERE id = :skillId LIMIT 1');
        $query->bindParam(':skillId', $skillId, PDO::PARAM_INT);

        return $query->execute();
    }

    /**
     * @param $personId
     * @param array $data
     * @return bool
     */
    public function createSkill($personId, array $data)
    {
        $query = $this->getConnection()->prepare('INSERT INTO skills 
                                                (person_id, data, level) VALUES (:personId, :data, :level)');
        $query->bindParam(':personId', $personId);
        $query->bindParam(':data', $data['data']);
        $query->bindParam(':level', $data['level'], PDO::PARAM_INT);

        return $query->execute();
    }
}
