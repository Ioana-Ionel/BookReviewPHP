<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BookReviews\Repository;

/**
 * Description of ReviewRepository
 *
 * @author ioana
 */
class ReviewRepository implements RepositoryInterface
{
    /**
     * @var \PDO
     */
    private $databaseConnection;

    /**
     * Sets the connection to the database
     * ReviewRepository constructor.
     */
    public function __construct()
    {
        $database = new DatabaseConnectionBuilder();
        $this->databaseConnection = $database->buildConnection();
    }

    public function get($id)
    {
        // TODO: Implement get() method.
    }

    public function add($object)
    {
        // TODO: Implement add() method.
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
