<?php

namespace BookReviews\Api\Controllers;

use BookReviews\Repository\ReaderRepository;
use BookReviews\Entity\Reader;
use BookReviews\Services\Validator;

/**
 * Class ReaderController
 * @package BookReviews\Api\Controllers
 */
class ReaderController
{
    /**
     * The function returns true if the reader is in the database
     * @param  object $request
     * @return string $response
     */
    public function login($request)
    {
        $response ='Ok';
        $repository = new ReaderRepository();
        $reader = $repository->findInDatabase($request->getUsername());
        $validator = new Validator();
        if ($validator->compareValues($reader->getPassword(), $request->getPassword())) {
            return $response;
        }
    }

    /**
     * If the username is not unique the function will return false
     * @param  object $reader
     * @return boolean
     */
    public function signUp($reader)
    {
        $repository = new ReaderRepository();

    }
}
