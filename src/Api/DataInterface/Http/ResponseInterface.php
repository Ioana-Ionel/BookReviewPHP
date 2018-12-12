<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 12/10/2018
 * Time: 2:02 PM
 */

namespace BookReviews\Api\DataInterface\Http;

/**
 * Interface ResponseInterface
 * @package BookReviews\Api\DataInterface\Http
 */
interface ResponseInterface
{
    public function getHeaders();
    public function getContentType();
    public function getResponseBody();
}
