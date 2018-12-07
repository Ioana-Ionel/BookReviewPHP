<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 12/7/2018
 * Time: 4:21 PM
 */

namespace BookReviews\Services;

/**
 * Class Validator
 * @package BookReviews\Services
 */
class Validator
{
    /**
     * Compares two values
     * @param $value
     * @param $compareValue
     * @return bool
     */
    public function compareValues($value, $compareValue)
    {
        if ($value === $compareValue) {
            return true;
        }
        return false;
    }
}

