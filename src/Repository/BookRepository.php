<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 12/24/2018
 * Time: 11:13 AM
 */

namespace BookReviews\Repository;

use \PDO;

/**
 * Class BookRepository
 * @package BookReviews\Repository\
 */
class BookRepository implements RepositoryInterface
{
    /**
     * @var PDO
     */
    private $connection;

    /**
     * It sets the connection to the database
     * ReaderRepository constructor.
     */
    public function __construct()
    {
        $database = new DatabaseConnectionBuilder();
        $this->connection = $database->buildConnection();
    }

    /**
     * @param int $id
     * @return mixed|void
     */
    public function get($id)
    {
        // TODO: Implement get() method.
    }

    /**
     * @param object $book
     * @return object|void
     */
    public function add($book)
    {
        $query = $this->connection->prepare('INSERT INTO books(ISBN, title , author, year)
                                                      VALUES(:ISBN, :title, :author, :year)');

    }

    public function update($object)
    {
        // TODO: Implement update() method.
    }

    public function delete($object)
    {
        // TODO: Implement delete() method.
    }
}