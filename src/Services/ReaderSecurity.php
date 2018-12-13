<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 12/13/2018
 * Time: 5:27 PM
 */

namespace BookReviews\Services;

/**
 * Class ReaderSecurity
 * @package BookReviews\Services
 */
class ReaderSecurity
{
    /**
     * @param string $password
     * @param string $salt
     * @return string
     */
    public function hashPassword($password, $salt)
    {
        $password = sprintf('%s%s', $password, $salt);
        $hashedPassword = sha1($password);
        return $hashedPassword;
    }
}