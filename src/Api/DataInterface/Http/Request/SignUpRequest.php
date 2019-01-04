<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 12/5/2018
 * Time: 1:44 PM
 */

namespace BookReviews\Api\DataInterface\Http\Request;

use BookReviews\Api\DataInterface\Http\RequestInterface;

/**
 * Class SignUpRequest
 * @package BookReviews\Api\DataInterface\Http\Request
 */
class SignUpRequest implements RequestInterface
{
    private const URL_PATH = '/signUp';

    /**
     * @var string
     */
    private $username ='';

    /**
     * @var string
     */
    private $password = '';

    /**
     * @var string
     */
    private $passwordRedo = '';

    /**
     * SignUpRequest constructor.
     * @param string $username
     * @param string $password
     * @param string $passwordRedo
     */
    public function __construct($username, $password, $passwordRedo)
    {
        $this->username = $username;
        $this->password = $password;
        $this->passwordRedo = $passwordRedo;
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
    public function getPasswordRedo()
    {
        return $this->passwordRedo;
    }
    /**
     * Returns the constant URL_PATH
     * @return string
     */
    public static function getPath()
    {
        return self::URL_PATH;
    }
}
