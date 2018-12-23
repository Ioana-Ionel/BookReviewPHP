<?php

namespace BookReviews\Api\Controllers;

use BookReviews\Repository\ReaderRepository;
use BookReviews\Services\ReaderValidator;
use BookReviews\Api\DataInterface\Http\Response;
use Twig_Loader_Filesystem;
use Twig_Environment;

/**
 * Class ReaderController
 * @package BookReviews\Api\Controllers
 */
class ReaderController
{
    /**
     * The function returns true if the reader is in the database
     * @param  object $request
     * @return object|null
     */
    public function login($request)
    {
        $repository = new ReaderRepository();
        $reader = $repository->findInDatabase($request->getUsername());
        $validator = new ReaderValidator();
        //TODO condense the code
        try {
            $loader = new Twig_Loader_Filesystem("html/");
            $twig = new Twig_Environment($loader);
            if ($validator->validatePassword($reader, $request->getPassword())) {
                $content = $twig->render('home.html.twig', ['reader' => $reader]);
                $response = new Response($content, 202, '/');

                return $response;
            } else {
                $invalidLogin = $validator->getInvalidLoginError();
                $content = $twig->render('login.html.twig', ['error' => $invalidLogin]);
                $response = new Response($content, 401, '/login');

                return $response;
            }
        } catch (\Twig_Error $e) {
            echo $e;
        }
        return null;
    }

    /**
     * @param object $request
     * @return Response
     */
    public function signUp($request)
    {
        $validator = new ReaderValidator();
        if ($validator->validateNewReaderPasswords($request->getPassword(), $request->getPasswordRedo())) {
            $repository = new ReaderRepository();
            $reader = $repository->addToDatabase($request->getUsername(), $request->getPassword());
            try {
                $loader = new Twig_Loader_Filesystem("html/");
                $twig = new Twig_Environment($loader);
                if ($reader != null) {
                    $content = $twig->render('home.html.twig', ['reader' => $reader]);
                    $response = new Response($content, 202, '/');

                    return $response;
                } else {
                    $validator = new ReaderValidator();
                    $signUpError = $validator->getInvalidSignUpError();
                    $content = $twig->render('signUp.html.twig', ['error' => $signUpError]);
                    $response = new Response($content, 401, '/signUp');

                    return $response;
                }
            } catch (\Twig_Error $e) {
                echo $e;
            }
        }
        return null;
    }
}
