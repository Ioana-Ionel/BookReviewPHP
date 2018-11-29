<?php

namespace BookReviews\Repository;

use \PDO;
/**
 * Class DataBaseConnection
 * @package BookReviews\Repository
 */

abstract class DataBaseConnection
{
    private $servername = "127.0.0.1";
    private $username = "root";
    private $password = "";

    public function __construct()
    {
        try {
            $dbh = new PDO('mysql:host=127.0.0.1;dbname=BookReviews', $this->username, $this->password);
        }
        catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
        }
    }
}
