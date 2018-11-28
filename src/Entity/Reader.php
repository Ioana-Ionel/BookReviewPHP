<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 11/27/2018
 * Time: 4:10 PM
 */

class Reader
{
    protected  $id;
    protected $username;
    protected $password;
    protected $salt;


    function __construct()
    {
        # this function sets a random id for a user
        $this->id = rand(100, 100000);

    }

    function getId()
    {
        return $this->id;
    }
}