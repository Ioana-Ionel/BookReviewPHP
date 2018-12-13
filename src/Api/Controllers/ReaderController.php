<?php

namespace BookReviews\Api\Controllers;

use BookReviews\Api\DataInterface\Http\ResponseFactory;
use BookReviews\Repository\ReaderRepository;
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
     * @return string
     */
    public function login($request)
    {
        $repository = new ReaderRepository();
        $reader = $repository->findInDatabase($request->getUsername());
        $validator = new ReaderValidator();
        if ($validator->validatePassword($reader, $request->getPassword())) {
            //TODO if the passwords match then a response object should be created and returned to the index
            $factory = new ResponseFactory();
            $response = $factory->create();
            return $response->renderHtml($reader, null);
        } else {
            $invalidLogin = $validator->getInvalidLoginError();
            $factory = new ResponseFactory();
            $response = $factory->create();
            return $response->renderHtml(null, $invalidLogin);
        }
    }

    /**
     * If the username is not unique the function will return false
     * @param  object $request
     */
    public function signUp($request)
    {
        $validator = new ReaderValidator();
        if ($validator->validateNewReaderPasswords($request->getPassword(), $request->getPasswordRedo())) {
            $repository = new ReaderRepository();
            $reader = $repository->addToDatabase($request->getUsername(), $request->getPassword());
            if ($reader != null) {
                echo 'ok';
            }
        }
    }
}
