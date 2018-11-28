<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 11/28/2018
 * Time: 10:04 AM
 */
include("DataBaseConnection.php");


class ReaderRepository extends DataBaseConnection
{
     function InsertIntoDb($username, $password)
    {

    }
}

$reader = new ReaderRepository();
