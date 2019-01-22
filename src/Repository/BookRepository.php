<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 12/24/2018
 * Time: 11:13 AM
 */

namespace BookReviews\Repository;

use \PDO;
use BookReviews\Entity\Book;

/**
 * Class BookRepository
 * @package BookReviews\Repository\
 */
class BookRepository implements RepositoryInterface
{
    /**
     * @var PDO
     */
    private $databaseConnection;

    /**
     * It sets the connection to the database
     * ReaderRepository constructor.
     */
    public function __construct()
    {
        $database = new DatabaseConnectionBuilder();
        $this->databaseConnection = $database->buildConnection();
    }

    /**
     * @param string $bookTitle
     * @return Book|null
     */
    public function findBookInDatabase($bookTitle)
    {
        $query= $this->databaseConnection->prepare("SELECT * FROM readers WHERE title= :bookTitle");
        $query->bindValue(':tile', $bookTitle, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_BOTH);
        if ($result != false) {
            return $this->builtBook(
                $result['id'],
                $result['ISBN'],
                $result['title'],
                $result['author'],
                $result['year']
            );
        }
        return null;
    }

    /**
     * @param $id
     * @param $ISBN
     * @param $title
     * @param $author
     * @param $year
     * @return Book
     */
    public function builtBook($id, $ISBN, $title, $author, $year)
    {
        $book = new Book();
        $book->setId($id);
        $book->setISBN($ISBN);
        $book->setTitle($title);
        $book->setAuthor($author);
        $book->setYear($year);

        return $book;
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
        $query = $this->databaseConnection->prepare('INSERT INTO books(ISBN, title , author, year)
                                                      VALUES(:ISBN, :title, :author, :year)');
    }

    /**
     * @param object $object
     * @return object|void
     */
    public function update($object)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param object $object
     */
    public function delete($object)
    {
        // TODO: Implement delete() method.
    }
}
