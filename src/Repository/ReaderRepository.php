<?php

namespace BookReviews\Repository;

use \PDO;

/**
 * Class ReaderRepository
 * @package BookReview\Repository
 */
class ReaderRepository implements RepositoryInterface
{
    /**
     * @var PDO
     */
    private $conn;

    public function __construct()
    {
        $database = new DatabaseConnectionBuilder();
        $this->conn = $database->buildConnection();
    }

    public function getId()
    {
        // TODO: Implement getId() method.
    }

    public function add()
    {
        // TODO: Implement add() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
    /**
     * The function returns  true if the result of the query returns an array
     * and the password matches the one in the array.
     * @param string $username
     * @param string $password
     * @return boolean
     */
    public function findInDatabase($username, $password)
    {
        $stmt= $this->conn->prepare("SELECT * FROM readers WHERE username= :username");
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_BOTH);
        if (count($result)!= 0 && $result[0][2] == $password) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * After checking if the username is unique insert the new reader in the database
     * @param  string $username
     * @param  string $password
     * @return boolean
     * @throws /Exception
     */

    public function addToDatabase($username, $password)
    {
        //TODO generate a hash for the password
        //TODO salt in repository
        $stmt = $this->conn->prepare("SELECT * FROM readers WHERE username= :username");
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_BOTH);
        if (sizeof($result)!= 0) {
            return false;
        }
        $salt = $this->createSalt();
        $stmt= $this->conn->prepare('INSERT into TABLE reades VALUES(id = :id,
                                username= :username,
                                password= :password,
                                salt= :salt)');
        $stmt->bindValue(':id', null);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->bindValue(':salt', $salt, PDO::PARAM_STR);
        $stmt->execute();
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function createSalt()
    {
        try {
            $salt = random_bytes(16);

            return $salt;
        } catch (Exeption $e) {
            echo $e;
        }
    }
}