<?php

namespace BookReviews\Repository;

use BookReviews\Entity\Reader;
use BookReviews\Services\ReaderSecurity;
use \PDO;

/**
 * Class ReaderRepository
 * @package BookReview\Repository
 */
class ReaderRepository implements RepositoryInterface
{
    /**
     * @var PDO
     */
    private $conn;

    /**
     * It sets the connection to the database
     * ReaderRepository constructor.
     */
    public function __construct()
    {
        $database = new DatabaseConnectionBuilder();
        $this->conn = $database->buildConnection();
    }

    /**
     * @param Reader $reader
     * @return int
     */
    public function get($reader)
    {
        // TODO: Implement get() method.
        return $reader->getId();
    }

    /**
     * It adds a reader to the database
     * @param object $reader
     */
    public function add($reader)
    {
        $stmt = $this->conn->prepare('INSERT INTO readers(username, password, salt) VALUES( :username, :password, :salt)');
        $username = $reader->getUsername();
        $password = $reader->getpassword();
        $salt = $reader->getSalt();
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->bindValue(':salt', $salt, PDO::PARAM_STR);
        $isSuccessful = $stmt->execute();
        if (!$isSuccessful) {
            throw new \PDOException(implode(' ', $stmt->errorInfo()));
        }
    }

    /**
     * Updates the data for a reader
     * @param object $reader
     * @return object|void
     */
    public function update($reader)
    {
        // TODO: Implement update() method.
    }

    /**
     * Deletes a reader
     * @param object $reader
     */
    public function delete($reader)
    {
        // TODO: Implement delete() method.
    }

    /**
     * The function returns a reader object
     * @param int $id
     * @param string $username
     * @param string $password
     * @param string $salt
     * @return Reader
     */
    public function builtReader($id, $username, $password, $salt)
    {
        $reader = new Reader();
        $reader->setId($id);
        $reader->setUsername($username);
        $reader->setPassword($password);
        $reader->setSalt($salt);
        return $reader;
    }

    /**
     * Returns a reader if it waas found in the database
     * @param string $username
     * @return Reader|null
     */
    public function findInDatabase($username)
    {
        $stmt= $this->conn->prepare("SELECT * FROM readers WHERE username= :username");
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_BOTH);
        if ($result != false) {
            return $this->builtReader(
                $result['id'],
                $result['username'],
                $result['password'],
                $result['salt']
            );
        }
        return null;
    }

    /**
     * After checking if the username is unique insert the new reader in the database
     * @param  string $username
     * @param  string $password
     * @return Reader|null
     * @throws /Exception
     */

    public function addToDatabase($username, $password)
    {
        if ($this->findInDatabase($username) == null) {
            $salt = $this->createSalt();
            $security = new ReaderSecurity();
            $hashedPassword = $security->hashPassword($password, $salt);
            $reader = $this->builtReader(null, $username, $hashedPassword, $salt);
            $this->add($reader);
            return $reader;
        }
        return null;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function createSalt()
    {
        try {
            $salt = random_bytes(16);

            return $salt;
        } catch (\Exception $e) {
            echo $e;
        }
        return null;
    }
}
