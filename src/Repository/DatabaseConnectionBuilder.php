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
    public function buildConnection()
    {
        try {
            $databaseConnection = new PDO(
                'mysql:host=127.0.0.1;dbname=BookReviews',
                'root',
                ''
            );

            return $databaseConnection;
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
        }
        return null;
    }
}
