<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 12/22/2018
 * Time: 10:01 AM
 */

namespace BookReviews\Api\DataInterface\Http;

/**
 * Class Response
 * @package BookReviews\Api\DataInterface\Http\
 */
class Response
{
    /**
     * @var int
     */
    private $responseCode;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $header;

    /**
     * Response constructor.
     * @param string $content
     * @param int    $responseCode
     * @param string $header
     */
    public function __construct($content, $responseCode, $header)
    {
        $this->responseCode = $responseCode;
        $this->content = $content;
        $this->header = $header;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return int
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * @return string
     */
    public function getHeader()
    {
        return $this->header;
    }
}
