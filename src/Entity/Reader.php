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
    private $id;

    /**
     * @var string
     */
    private $username='';

    /**
     * @var string
     */
    private $password='';

    /**
     * @var string
     */
    private $salt='';

    /**
     * @param  int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt =$salt;
    }

    /**
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

}
