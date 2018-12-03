<?php

namespace BookReviews\Repository;

use \PDO;
use \PDOException;

/**
 * Class DatabaseConnection
 * @package BookReviews\Repository
 */
abstract class DatabaseConnection
{
    /**
     * @var string
     */
    private $username = "root";

    /**
     * @var string
     */
    private $password = "";

    /**
     * The function returns the connection to the database
     * @return PDO
     */
    public function connectToDatabase()
    {
        try {
            $conn = new PDO('mysql:host=127.0.0.1;dbname=BookReviews', $this->username, $this->password);
            return $conn;
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
        }
    }

    /**
     * The function returns an array if the query is true
     * @param  string  $query
     * @return array
     */
    public function selectFromDatabase($query)
    {
        $conn= $this->connectToDatabase();
        $stmt= $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_BOTH);
    }

    /**
     * @param string $query
     */
    public function insertIntoDatabase($query)
    {
        $conn= $this->connectToDatabase();
        $stmt= $conn->prepare($query);
        $stmt->execute();
    }
}
