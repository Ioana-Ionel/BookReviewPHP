<?php
/**
 * Created by PhpStorm.
 * User: ioana
 * Date: 12/10/2018
 * Time: 1:03 PM
 */

namespace BookReviews\Api\DataInterface\Http\Response;

use BookReviews\Api\DataInterface\Http\ResponseInterface;
use BookReviews\Services\ErrorMessages;
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
     * @param Reader        $reader
     * @param ErrorMessages $error
     * @return |null
     */
    public function renderHtml($reader, $error)
    {
        try {
            $loader = new Twig_Loader_Filesystem("html/");
            $twig = new Twig_Environment($loader);
            return $twig->render('home.html.twig', array('reader' => $reader, 'error' => $error));
        } catch (\Twig_Error $e) {
            echo $e;
        }
        return null;
    }

    /**
     * Returns the header
     * @return mixed|void
     */
    public function getHeaders()
    {
        // TODO: Implement getHeaders() method.
    }

    /**
     * Returns the status code
     * @return int|void
     */
    public function getStatusCode()
    {
        // TODO: Implement getStatusCode() method.
    }

    /**
     * Returns the content
     * @return mixed|void
     */
    public function getContent()
    {
        // TODO: Implement getContent() method.
    }

    /**
     * @return string
     */
    public static function getPath()
    {
        return self::URL_PATH;
    }
}
