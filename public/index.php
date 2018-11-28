<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 11/27/2018
 * Time: 4:17 PM
 */



$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
$request_method = $_SERVER['REQUEST_METHOD'];


switch ($request_uri[0]) {

    case '/':
        #redirect login

    case '/login':

        require 'html/login.html';
        break;


    case '/home':
        require 'html/home.html';

    default:
        header('HTTP/1.0 404 Not Found');
        require '404.php';
        break;

}