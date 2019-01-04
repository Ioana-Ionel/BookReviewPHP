<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 12/3/2018
 * Time: 11:30 PM
 */

namespace BookReviews\Repository;

/**
 * Interface RepositoryInterface
 * @package BookReviews\Repository
 */
interface RepositoryInterface
{
    /**
     * The getId function should be able to return the id of the user, book or book review if it is necessary
     * @param int $id
     * @return mixed
     */
    public function get($id);

    /**
     * It will add data from a table
     * @param object $object
     * @return object
     */
    public function add($object);

    /**
     * We will update data in a table
     * @param object $object
     * @return object
     */
    public function update($object);

    /**
     * Delete data from a table
     * @param object $object
     */
    public function delete($object);
}
