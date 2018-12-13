<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 12/13/2018
 * Time: 8:51 PM
 */

namespace BookReviews\Services;

/**
 * Class ErrorMessages
 * @package BookReviews\Services
 */
class ErrorMessages
{
    /**
     * string
     */
    private $message;

    /**
     * ErrorMessages constructor.
     * @param $message
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }
}
