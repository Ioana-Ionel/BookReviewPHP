<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 12/23/2018
 * Time: 9:58 PM
 */

namespace BookReviews\Entity;

/**
 * Class Book
 * @package BookReviews\Entity
 */
class Book
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $ISBN;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $author;

    /**
     * @var int
     */
    private $year;

    /**
     * @param int $id
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
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $ISBN
     */
    public function setISBN($ISBN)
    {
        $this->ISBN = $ISBN;
    }

    /**
     * @return string
     */
    public function getISBN()
    {
        return $this->ISBN;
    }

    /**
     * @param int $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }
}
