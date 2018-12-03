<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 11/27/2018
 * Time: 4:17 PM
 */

include "../vendor/autoload.php";

$request_uri = $_SERVER["REQUEST_URI"];
$path = parse_url($request_uri, PHP_URL_PATH);

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
            $username = $_POST['username'];
            $password = $_POST['password'];
            echo sprintf("%s %s", $username, $password);
        }
        break;

    case '/home':
        require 'html/home.html';
        break;

    default:
        header('HTTP/1.0 404 Not Found');
        require '404.php';
        break;

}
