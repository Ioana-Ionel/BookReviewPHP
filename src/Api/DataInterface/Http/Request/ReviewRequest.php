<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 1/15/2019
 * Time: 8:43 PM
 */

namespace BookReviews\Api\DataInterface\Http\Request;

/**
 * Class ReviewRequest
 * @package BookReviews\Api\DataInterface\Http\Request
 */
class ReviewRequest
{
    private const URL_PATH = '/';

    /**
     * @var string
     */
    private $bookTitle;

    /**
     * @var string
     */
    private $rating;

    /**
     * @var string
     */
    private $review;

    /**
     * ReviewRequest constructor.
     * @param string $bookTitle
     * @param string $rating
     * @param string $review
     */
    public function __construct($bookTitle, $rating, $review)
    {
        $this->bookTitle = $bookTitle;
        $this->rating = $rating;
        $this->review = $review;
    }

    /**
     * @return string
     */
    public function getBookTitle()
    {
        return $this->bookTitle;
    }

    /**
     * @return string
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @return string
     */
    public function getReview()
    {
        return $this->review;
    }

    /**
     * @return mixed
     */
    public static function getPath()
    {
        return self::URL_PATH;
    }
}
