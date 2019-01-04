<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 12/5/2018
 * Time: 1:43 PM
 */

namespace BookReviews\Api\DataInterface\Http\Request;

use BookReviews\Api\DataInterface\Http\RequestInterface;

/**
 * Class LogInRequest
 * @package BookReviews\Api\DataInterface\Http\Request
 */
class LogInRequest implements RequestInterface
{

    private const URL_PATH = '/login';

    /**
     * @var string
     */
    private $username = '';

    /**
     * @var string
     */
    private $password = '';

    /**
     * LogInRequest constructor.
     * @param string $username
     * @param string $password
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return \BookReviews\Entity\Reader|void|null
     */
    public function getLoggedInReader()
    {
        // TODO: Implement getLoggedInReader() method.
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public static function getPath()
    {
        return self::URL_PATH;
    }
}
