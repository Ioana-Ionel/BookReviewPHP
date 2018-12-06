<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 12/5/2018
 * Time: 1:42 PM
 */

namespace BookReviews\Api\DataInterface\Http;

/**
 * Interface RequestInterface
 * @package BookReviews\Api\DataInterface\Http
 */
interface RequestInterface
{
    /**
     * @param string $parameters
     * @return mixed
     */
    public function create($parameters);
}
