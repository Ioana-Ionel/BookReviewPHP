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
     * @return PDO
     */
    public function databaseConnection()
    {
        try {
            $conn = new PDO('mysql:host=127.0.0.1;dbname=BookReviews', $this->username, $this->password);
            return $conn;
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
        }
    }
}
