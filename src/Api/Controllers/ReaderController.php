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
     * @param string  $username
     * @param string  $password
     */
    public function login($username, $password)
    {
        $reader = new ReaderRepository();
        $reader->findInDatabase($username, $password);
    }
}
