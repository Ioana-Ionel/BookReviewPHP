<?php

namespace BookReviews\Api\Controllers;

use BookReviews\Repository\ReaderRepository;

/**
 * Class ReaderController
 * @package BookReviews\Api\Controllers
 */
class ReaderController
{
    /**
     * The function returns true if the reader is in the database
     * @param  string  $username
     * @param  string  $password
     * @return boolean
     */
    public function login($username, $password)
    {
        $reader = new ReaderRepository();
        return $reader->findInDatabase($username, $password);
    }

    /**
     * If the username is not unique the function will return false
     * @param  string  $username
     * @param  string  $password
     * @return boolean
     */
    public function signUp($username, $password)
    {
        $reader = new ReaderRepository();
        if ($reader->addToDatabase($username, $password) == false) {
            return false;
        }
    }
}
