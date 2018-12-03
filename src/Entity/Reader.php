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
    protected $id;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $salt;

    /**
     * This function sets a random id for the user
     *
     * Reader constructor.
     */
    public function __construct()
    {
        //TODO change to generate unique id
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
