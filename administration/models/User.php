<?php

namespace administration\models;

use common\Database;
use common\Router;
use PDO;

/**
 * Class User
 * @package administration\models
 */
class User extends Database
{
    const AUTH_TOKEN = 'auth_token';

    /**
     * @var null|bool
     */
    private $isGuest = true;

    /**
     * @param $login
     * @param $password
     * @param $name
     * @return bool
     */
    public function addUser($login, $password, $name)
    {
        $query = $this->getConnection()->prepare('INSERT INTO personal SET login = :login, password = :password, name = :name');
        return $query->execute([":login" => $login, ":password" => md5($password), "name" => $name]);
    }

    /**
     * @param string $login
     * @param string $password
     * @return bool
     */
    public function login($login, $password)
    {
        $passwordHash = md5($password);
        $query = $this->getConnection()->prepare('SELECT id FROM personal WHERE login = :login AND password = :password');
        $query->bindParam(':login', $login, PDO::PARAM_STR);
        $query->bindParam(':password', $passwordHash, PDO::PARAM_STR);

        $result = false;
        if ($query->execute() && (boolean)$query->fetchColumn()) {
            $_SESSION[self::AUTH_TOKEN] = $this->generateAuthKey($login, $passwordHash);
            $result = true;
        }

        return $result;
    }

    /**
     * @return bool
     */
    public function logout()
    {
        if (isset($_SESSION[self::AUTH_TOKEN])) {
            unset($_SESSION[self::AUTH_TOKEN]);
        }

        return true;
    }

    public function getCurrentPersonId()
    {
        if ($authToken = $this->getAuthorizedKey()) {
            $query = $this
                ->getConnection()
                ->prepare('SELECT id FROM personal WHERE MD5(CONCAT_WS("@", login, password)) = :hash');
            $query->bindParam(':hash', $authToken, PDO::PARAM_STR);
            if($query->execute());

            return $query->fetchColumn();
        }

        return null;
    }

    /**
     * @return bool
     */
    public function isGuest()
    {
        if ($authToken = $this->getAuthorizedKey()) {
            $query = $this
                ->getConnection()
                ->prepare('SELECT id FROM personal WHERE MD5(CONCAT_WS("@", login, password)) = :hash');
            $query->bindParam(':hash', $authToken, PDO::PARAM_STR);
            $query->execute();

            $this->isGuest = (int)$query->fetchColumn() <= 0;
        }

        return $this->isGuest;
    }

    public function isRegisterRequest()
    {
        $registerUrl = '/' . Router::getInstance()->getRoutMarker() . '/index/register';
        return 0 === stripos($_SERVER['REQUEST_URI'], $registerUrl);
    }

    /**
     * @return bool
     */
    public function isAuthRequest()
    {
        $authUrl = '/' . Router::getInstance()->getRoutMarker() . '/index/auth';
        return 0 === stripos($_SERVER['REQUEST_URI'], $authUrl);
    }

    /**
     * @return null|string
     */
    private function getAuthorizedKey()
    {
        return isset($_SESSION[self::AUTH_TOKEN]) ? $_SESSION[self::AUTH_TOKEN] : null;
    }

    /**
     * @param string $login
     * @param string $password
     * @return string
     */
    private function generateAuthKey($login, $password)
    {
        return md5($login . '@' . $password);
    }
}
