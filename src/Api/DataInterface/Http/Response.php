<?php
/**
 * Created by PhpStorm.
 * User: hard
 * Date: 12/4/18
 * Time: 17:55
 */

namespace BookReviews\Api\DataInterface\Http;

class Response
{
    private $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}
