<?php

namespace BookReviews\Repository;

use BookReviews\Api\Controllers\ReaderController;
use BookReviews\Entity\Reader;
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

    /**
     * It sets the connection to the database
     * ReaderRepository constructor.
     */
    public function __construct()
    {
        $database = new DatabaseConnectionBuilder();
        $this->conn = $database->buildConnection();
    }


    public function get($id)
    {
        // TODO: Implement get() method.
        return $this->reader->getId();
    }

    public function add($reader)
    {
        throw new \Exception('Not implemented');
    }

    public function update($reader)
    {
        // TODO: Implement update() method.
    }

    public function delete($reader)
    {
        // TODO: Implement delete() method.
    }

    /**
     * The function returns a reader object
     * @param int $id
     * @param string $username
     * @param string $password
     * @param string $salt
     * @return Reader
     */
    public function builtReader($id, $username, $password, $salt)
    {
        $reader = new Reader();
        $reader->setId($id);
        $reader->setUsername($username);
        $reader->setPassword($password);
        $reader->setSalt($salt);
        return $reader;
    }

    /**
     * @param string $username
     * @return Reader|null
     */
    public function findInDatabase($username)
    {
        $stmt= $this->conn->prepare("SELECT * FROM readers WHERE username= :username");
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_BOTH);
        if (count($result)!=0) {
            $this->builtReader($result[0]['id'], $result[0]['username'], $result[0]['password'], $result[0]['salt']);
        } else {
            return null;
        }
    }

    /**
     * After checking if the username is unique insert the new reader in the database
     * @param  string $username
     * @param  string $password
     * @return boolean
     * @throws /Exception
     */

    public function addToDatabase($request)
    {
        //TODO generate a hash for the password
        //TODO salt in repository
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