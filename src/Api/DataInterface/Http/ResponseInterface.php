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
    /**
     * Returns the header
     * @return mixed
     */
    public function getHeaders();

    /**
     * Returns the status code
     * @return int
     */
    public function getStatusCode();

    /**
     * Returns the content
     * @return mixed
     */
    public function getContent();
}
