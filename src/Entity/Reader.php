<?php

namespace BookReviews\Entity;

/**
 * Class Reader
 * @package BookReviews\Entity
 */
class Reader
{
    protected $id;
    protected $username;
    protected $password;
    protected $salt;

    /**
     * This function sets a random id for the user
     *
     * Reader constructor.
     */
    public function __construct()
    {
        $this->id = rand(100, 100000);
    }

    /**
     * The function returns the id of a reader
     *
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }
}