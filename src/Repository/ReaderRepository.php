<?php

namespace BookReviews\Repository;

/**
 * Class ReaderRepository
 * @package BookReview\Repository
 */
class ReaderRepository implements Repository
{
    private $conn = null;

    private function connectToDatabase()
    {
        try {
            $conn = new PDO('mysql:host=127.0.0.1;dbname=BookReviews', $this->username, $this->password);
            return $conn;
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
        }
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
        $result = $this->selectFromDatabase($query);
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
        $uniqueReader = "Select * from readers where username= \"{$username}\"";
        if (sizeof($uniqueReader)== 0) {
            return false;
        }
        $query = ("Insert into table readers values(id=id, username = username, password = password, salt =salt)");
        $this->insertIntoDatabase($query);
    }
}