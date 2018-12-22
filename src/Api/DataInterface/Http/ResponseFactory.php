<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 12/5/2018
 * Time: 1:43 PM
 */

namespace BookReviews\Api\DataInterface\Http;

use BookReviews\Api\DataInterface\Http\Response\LoginResponse;

/**
 * Class ResponseFactory
 * @package BookReviews\Api\DataInterface\Http
 */
class ResponseFactory
{
    /**
     * @return LoginResponse|null
     */
    public function create()
    {
        $request_uri = $_SERVER["REQUEST_URI"];
        $path = parse_url($request_uri, PHP_URL_PATH);

        if ($path === LoginResponse::getPath()) {
            $loginResponse = new LoginResponse();

            return $loginResponse;
        }

        return null;
    }
}
