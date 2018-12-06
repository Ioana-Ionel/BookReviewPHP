<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 12/5/2018
 * Time: 1:44 PM
 */

namespace BookReviews\Api\DataInterface\Http\Request;

use BookReviews\Api\DataInterface\Http\RequestInterface;
use BookReviews\Entity\Reader;

/**
 * Class SignUpRequest
 * @package BookReviews\Api\DataInterface\Http\Request
 */
class SignUpRequest implements RequestInterface
{

    /**
     * @param string $param
     * @return Reader
     */
    public function create($param)
    {
        $param = explode(' ', $param);
        $username = $param[0];
        $password = $param[1];
        $passwordRedo  =$param[2];

        //TODO compare passwords, if they don't match send a response?
        $reader = new Reader();
        $reader->username = $username;
        $reader->password = $password;

        return $reader;
    }
}
