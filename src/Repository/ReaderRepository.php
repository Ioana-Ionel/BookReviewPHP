<?php

namespace BookReviews\Repository;

use \PDO;

/**
 * Class ReaderRepository
 * @package BookReview\Repository
 */
class ReaderRepository implements Repository
{
    /**
     * @var PDO
     */
    private $conn;

    public function __construct()
    {
        $database = new DatabaseConnectionBuilder();
        $this->conn = $database->connectToDatabase();
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
        $query = "Select * from readers where username= \"{$username}\"";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_BOTH);
        if (sizeof($result)!= 0 && $result[0][2] == $password) {
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
     */

    public function addToDatabase($username, $password)
    {
        //TODO generate a hash for the password
        //TODO salt in repository
        $uniqueUsername = "Select * from readers where username= \"{$username}\"";
        $stmt= $this->conn->prepare($uniqueUsername);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_BOTH);
        if (sizeof($result)!= 0) {
            return false;
        }
        $uniqueUsername = ("Insert into table readers values(id=id,
                                 username = \"{$username}\",
                                 password = \"{$password}\",
                                 salt =salt)");
        $stmt= $this->conn->prepare($uniqueUsername);
        $stmt->execute();
    }
}