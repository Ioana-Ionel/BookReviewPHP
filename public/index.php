<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 11/27/2018
 * Time: 4:17 PM
 */

include "../vendor/autoload.php";

$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
}


switch ($request_uri[0]) {

    case '/':

        redirect('/login');

    case '/login':
        if ($_SERVER['REQUEST_METHOD']==='GET') {
            require 'html/login.html';
        }
        elseif ($_SERVER['REQUEST_METHOD']==='POST'){
            $username = $_POST['username'];
            $password = $_POST['password'];

            echo $username.' '.$password;
        }
        break;


    case '/home':
        require 'html/home.html';

    default:
        header('HTTP/1.0 404 Not Found');
        require '404.php';
        break;

}