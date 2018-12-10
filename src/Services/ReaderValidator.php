<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 12/7/2018
 * Time: 4:21 PM
 */

namespace BookReviews\Services;

use BookReviews\Entity\Reader;

/**
 * Class ReaderValidator
 * @package BookReviews\Services
 */
class ReaderValidator
{
    /**
     * @param Reader $reader
     * @param string $requestPassword
     * @return boolean
     */
    public function validateHashedPassword($reader, $requestPassword)
    {
        //TODO hash the password
        $salt = $reader->getSalt();
        $hashedRequestPassword =  $this->hashPassword($requestPassword, $salt);
        if ($reader->getPassword() === $hashedRequestPassword) {
            return true;
        }
        return false;
    }

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

    /**
     * @param string $password
     * @param string $passwordRedo
     * @return boolean
     */
    public function validatePasswords($password, $passwordRedo)
    {
        if ($password === $passwordRedo) {
            return true;
        }
        return false;
    }
}

