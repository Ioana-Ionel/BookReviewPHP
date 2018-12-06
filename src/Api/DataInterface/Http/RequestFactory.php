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

/**
 * Class RequestFactory
 * @package BookReviews\Api\DataInterface\Http
 */
class RequestFactory
{
    /**
     * @param string $path
     * @return Mixed
     */
    public function create($path)
    {
        if ($path === LogInRequest::getPath()) {
            $request = new LogInRequest();

            return $request;
        }
    }
}
