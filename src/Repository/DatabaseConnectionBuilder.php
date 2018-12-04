<?php

namespace BookReviews\Repository;

use \PDO;
use \PDOException;

/**
 * Class DatabaseConnectionBuilder
 * @package BookReviews\Repository
 */
class DatabaseConnectionBuilder
{
    /**
     * @return PDO
     */
    public function connectToDatabase()
    {
        try {
            $database = new PDO(
                'mysql:host=127.0.0.1;dbname=BookReviews',
                'root',
                ''
            );

            return $database;
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
        }
    }
}
    /*
     * The function returns an array if the query is true
     * @param  string  $query
     * @return array
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
    /*public function insertIntoDatabase($query)
    {
        $conn= $this->connectToDatabase();
        $stmt= $conn->prepare($query);
        $stmt->execute();
    }
}*/
