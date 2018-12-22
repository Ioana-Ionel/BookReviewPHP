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

/**
 * @param string $content
 */
function render($content)
{
    ob_start();
    echo $content;
    ob_end_flush();
}

switch ($path) {
    case '/':
        if (empty($_SESSION['user'])) {
            redirect('/login');
        } else {
            render($_SESSION['content']);
        }
        break;

    case '/login':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require 'html/login.html';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $factory = new RequestFactory();
            $request = $factory->create();
            $controller = new ReaderController();
            $response = $controller->login($request);
            if ($response->getResponseCode() === 202) {
                $_SESSION['user'] = $request->getUsername();
                $_SESSION['content'] = $response->getCOntent();
                redirect($response->getHeader());
            } elseif ($response->getResponseCode() === 401) {
                render($response->getContent());
            }
        }
        break;

    case '/signUp':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require 'html/signUp.html';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $factory = new RequestFactory();
            $request = $factory->create();
            $controller = new ReaderController();
            $controller->signUp($request);
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
