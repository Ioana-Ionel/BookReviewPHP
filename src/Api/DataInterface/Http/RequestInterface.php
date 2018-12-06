<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 12/5/2018
 * Time: 1:42 PM
 */

namespace BookReviews\Api\DataInterface\Http;

use BookReviews\Entity\Reader;

/**
 * Interface RequestInterface
 * @package BookReviews\Api\DataInterface\Http
 */
interface RequestInterface
{
    /**
     * Returns the logged in reader of null when no user is authenticated
     * @return Reader|null
     */
    public function getLoggedInReader();

    /**
     * Returns tha path constant
     * @return string
     */
    public static function getPath();

}
