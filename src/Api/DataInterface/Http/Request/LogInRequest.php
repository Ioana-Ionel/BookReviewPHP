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
    private $username = null;

    /**
     * @var string
     */
    private $password = null;

    /**
     * LogInRequest constructor.
     */
    public function __construct()
    {
        $this->username = $this->getUsername();
        $this->password = $this->getPassword();
    }

    /**
     * @return \BookReviews\Entity\Reader|void|null
     */
    public function getLoggedInReader()
    {
        // TODO: Implement getLoggedInReader() method.
    }

    public function getUsername()
    {
        $this->username = $_POST['username'];
    }

    public function getPassword()
    {
        $this->password = $_POST['password'];
    }

    /**
     * @return string
     */
    public static function getPath()
    {
        return self::URL_PATH;
    }
}
