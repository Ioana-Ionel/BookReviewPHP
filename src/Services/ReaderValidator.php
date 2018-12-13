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
     * @param string $password
     * @return boolean
     */
    public function validatePassword($reader, $password)
    {
        //TODO hash the password
        $salt = $reader->getSalt();
        $security = new ReaderSecurity();
        $hashedPassword = $security->hashPassword($password, $salt);
        if ($reader->getPassword() === $hashedPassword) {
            return true;
        }
        return false;
    }

    /**
     * @return ErrorMessages
     */
    public function getInvalidLoginError()
    {
        $error = new ErrorMessages('Invalid credentials');
        return $error;
    }

    /**
     * @param string $password
     * @param string $passwordRedo
     * @return boolean
     */
    public function validateNewReaderPasswords($password, $passwordRedo)
    {
        if ($password === $passwordRedo) {
            return true;
        }
        return false;
    }
}

