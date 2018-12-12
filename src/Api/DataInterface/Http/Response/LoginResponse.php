<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 12/10/2018
 * Time: 1:03 PM
 */

namespace BookReviews\Api\DataInterface\Http\Response;

use BookReviews\Api\DataInterface\Http\ResponseInterface;
use Twig_Loader_Filesystem;
use Twig_Environment;
use BookReviews\Entity\Reader;

/**\
 * Class LoginResponse
 * @package BookReviews\Api\DataInterface\Http\Response
 */
class LoginResponse implements ResponseInterface
{
    /**
     * @param string
     */
    private const URL_PATH = '/login';


    /**
     * @return string
     */
    public static function getPath()
    {
        return self::URL_PATH;
    }


    /**
     * @param Reader $reader
     * @return string
     */
    public function renderHtml($reader)
    {
        try {
            $loader = new Twig_Loader_Filesystem("html/");
            $twig = new Twig_Environment($loader);
            return $twig->render('home.html.twig', array('reader' => $reader->getUsername()));
        } catch (\Twig_Error $e) {
            echo $e;
        }
        return null;
    }


    public function getHeaders()
    {
        // TODO: Implement getHeaders() method.
    }

    public function getContentType()
    {
        // TODO: Implement getContentType() method.
    }

    /**
     * This function should return the html page
     */
    public function getResponseBody()
    {
        // TODO: Implement getResponseBody() method.
    }
}
