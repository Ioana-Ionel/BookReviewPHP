<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 12/5/2018
 * Time: 1:42 PM
 */

namespace BookReviews\Api\DataInterface\Http;

use BookReviews\Api\DataInterface\Http\Request\LogInRequest;
use BookReviews\Api\DataInterface\Http\Request\SignUpRequest;
use BookReviews\Api\DataInterface\Http\Request\ReviewRequest;

/**
 * Class RequestFactory
 * @package BookReviews\Api\DataInterface\Http
 */
class RequestFactory
{
    /**
     * @return Mixed|null
     */
    public function create()
    {
        $request_uri = $_SERVER["REQUEST_URI"];
        $path = parse_url($request_uri, PHP_URL_PATH);

        if ($path === LogInRequest::getPath()) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $request = new LogInRequest($username, $password);

            return $request;
        } elseif ($path === SignUpRequest::getPath()) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $passwordRedo = $_POST['passwordRedo'];
            $request = new SignUpRequest($username, $password, $passwordRedo);

            return $request;
        } elseif ($path === ReviewRequest::getPath()) {
            $book = $_POST["book"];
            $rating = $_POST["rating"];
            $review = $_POST["review"];
            $request = new ReviewRequest($book, $rating, $review);

            return $request;
        }
        return null;
    }
}
