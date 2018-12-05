<?php

namespace BookReviews\Api\Controllers;

use BookReviews\Api\DataInterface\Http\Response;
use BookReviews\Repository\ReaderRepository;

/**
 * Class ReaderController
 * @package BookReviews\Api\Controllers
 */
class ReaderController
{
    public function index()
    {
        //Create the loader and the environment in an abstract controller with a getTwig() method
        $loader = new \Twig_Loader_Filesystem(['path to folder with twig files']);
        $twig = new \Twig_Environment($loader);

        return new Response($twig->render('twig-file-name-here', ['paramName' => $paramValue]));
    }

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
