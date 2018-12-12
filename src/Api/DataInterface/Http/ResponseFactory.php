<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 12/5/2018
 * Time: 1:43 PM
 */

namespace BookReviews\Api\DataInterface\Http;

use BookReviews\Api\DataInterface\Http\Response\LoginResponse;
use BookReviews\Entity\Reader;

/**
 * Class ResponseFactory
 * @package BookReviews\Api\DataInterface\Http
 */
class ResponseFactory
{
    /**
     * @param Reader $reader
     * @return LoginResponse
     */
    public function create()
    {
        $request_uri = $_SERVER["REQUEST_URI"];
        $path = parse_url($request_uri, PHP_URL_PATH);

        if ($path === LoginResponse::getPath()) {
            $loginResponse = new LoginResponse();
            return $loginResponse;
        }
    }
}

