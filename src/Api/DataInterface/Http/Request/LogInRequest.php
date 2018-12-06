<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 12/5/2018
 * Time: 1:43 PM
 */

namespace BookReviews\Api\DataInterface\Http\Request;

use BookReviews\Api\DataInterface\Http\RequestInterface;
use BookReviews\Entity\Reader;

/**
 * Class LogInRequest
 * @package BookReviews\Api\DataInterface\Http\Request
 */
class LogInRequest implements RequestInterface
{
    /**
     * @param string $param
     * @return Reader|mixed
     */
    public function create($param)
    {
        $param = explode(' ', $param);
        $username = $param[0];
        $password = $param[1];
        $reader  = new Reader();
        $reader->username = $username;
        $reader->password = $password;

        return $reader;
    }
}
