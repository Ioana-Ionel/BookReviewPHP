<?php

namespace BookReviews\Api\Controllers;

use BookReviews\Repository\ReaderRepository;
use BookReviews\Entity\Reader;
use BookReviews\Services\ReaderValidator;

/**
 * Class ReaderController
 * @package BookReviews\Api\Controllers
 */
class ReaderController
{
    /**
     * The function returns true if the reader is in the database
     * @param  object $request
     * @return boolean
     */
    public function login($request)
    {
        $repository = new ReaderRepository();
        $reader = $repository->findInDatabase($request->getUsername());
        $validator = new ReaderValidator();
        if ($validator->validateHashedPassword($reader, $request->getPassword())) {
            return true;
        }
    }

    /**
     * If the username is not unique the function will return false
     * @param  object $request
     */
    public function signUp($request)
    {
        $validator = new ReaderValidator();
        if ($validator->validatePasswords($request->getPassword(), $request>getPasswordRedo())) {
            $repository = new ReaderRepository();
            $reader = $repository->addToDatabase($request->getUsername, $request->getPassword);
        }
    }
}
