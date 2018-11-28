<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 11/28/2018
 * Time: 10:06 AM
 */

abstract class DataBaseConnection
{
    private $servername = "127.0.0.1";
    private $username = "root";
    private $password = "";
    function __construct()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connection successful";


    }
}

