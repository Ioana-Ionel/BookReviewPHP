<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 11/27/2018
 * Time: 4:17 PM
 */

include "../vendor/autoload.php";
use BookReviews\Api\Controllers\ReaderController;
use \BookReviews\Api\DataInterface\Http\RequestFactory;

$request_uri = $_SERVER["REQUEST_URI"];
$path = parse_url($request_uri, PHP_URL_PATH);

//TODO I have to place the start session somewhere else
//TODO if someone tries to access the /home path when there is nobody logged in, currently it should be possible
session_start();

/**
 * @param string $url
 */
function redirect($url)
{
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
}

switch ($path) {
    case '/':
        redirect('/login');
        break;

    case '/login':
        if ($_SERVER['REQUEST_METHOD']==='GET') {
            require 'html/login.html';
        } elseif ($_SERVER['REQUEST_METHOD']==='POST') {
            $factory = new RequestFactory();
            $request = $factory->create();
            $controller = new ReaderController();
            if ($controller->login($request)) {
                $loader = new Twig_Loader_Filesystem("C:\wamp64\www\books\public\html\");
                $twig = new Twig_Environment($loader);
                $twig->render('home.html', array('reader'=>$request->getUsername()));
            }
        }
        break;

    case '/signUp':
        if ($_SERVER['REQUEST_METHOD']==='GET') {
            require 'html/signUp.html';
        } elseif ($_SERVER['REQUEST_METHOD']==='POST') {
            $factory = new RequestFactory();
            $request = $factory->create();
            $controller = new ReaderController();
            $controller->signUp($request);
        }
        break;

    case '/home':
        if ($_SERVER['REQUEST_METHOD']==='GET') {
            require 'html/home.html';
        }
        break;

    case '/logout':
        unset($_SESSION['user']);
        session_destroy();
        redirect("/login");
        break;

    default:
        header('HTTP/1.0 404 Not Found');
        require '404.php';
        break;

}
