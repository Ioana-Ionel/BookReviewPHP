<?php

namespace BookReviews\Entity;

/**
 * Class Reader
 * @package BookReviews\Entity
 */
class Reader
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $username;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $salt;
}
