<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 11/27/2018
 * Time: 4:06 PM
 */
include("../src/Repository/ReaderRepository.php");
class ReaderController
{

    function login($username, $password){

        $username=$_POST("username");
        $password=$_POST("password");
        $reader = new ReaderRepository();
        $reader->InsertIntoDB($username, $password);
    }
}

