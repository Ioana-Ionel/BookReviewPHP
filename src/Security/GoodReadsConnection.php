<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 1/11/2019
 * Time: 10:42 AM
 */

namespace BookReviews\Security;

/**
 * Class GoodReadsConnection
 * @package BookReviews\Security
 */
class GoodReadsConnection
{
    public function __construct()
    {
        $key = "a3Xze6KnDHEH2RQ16UKpmw";
        $secret = "vH9b0iEcae2iYXUim5jy17d60edpkQTA6gkrwZ2fQs";
        $curl = curl_init('wwww.goodreads.com/key='.$key);
        curl_exec($curl);
        echo $curl.author.books;
        curl_close($curl);

    }
}