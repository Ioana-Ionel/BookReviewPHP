<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 12/3/2018
 * Time: 11:30 PM
 */

namespace BookReviews\Repository;

/**
 * Interface Repository
 * @package BookReviews\Repository
 */
interface Repository
{
    public function getId();
    public function add();
    public function update();
    public function delete();
}