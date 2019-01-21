<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 1/15/2019
 * Time: 9:30 PM
 */

namespace BookReviews\Api\Controllers;

use BookReviews\Repository\BookRepository;
use BookReviews\Repository\ReaderRepository;
use BookReviews\Repository\ReviewRepository;

/**
 * Class ReviewController
 * @package BookReviews\Api\Controllers
 */
class ReviewController
{
    /**
     * @param object $request
     * @param string $username
     */
    public function addReview($request, $username)
    {
        $readerRepository = new ReaderRepository();
        $reader = $readerRepository->findReaderInDatabase($username);
        $bookRepository = new BookRepository();
        $book = $bookRepository->findBookInDatabase($request->getBookTitle());
        $reviewRepository = new ReviewRepository();
    }
}
