<?php
/**
 * Controller File
 *
 * Handles requests for the homepage
 *
 * @author Etch Akhtar
 * @version 1.0
 * @since 23rd Jul 2016
 * @copyright Copyright (c) 2016, Etch Akhtar
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Controller Class
 *
 * Handles requests for the homepage
 *
 * @author Etch Akhtar
 * @version 1.0
 * @since 23rd Jul 2016
 * @copyright Copyright (c) 2016, Etch Akhtar
 */
class FrontController extends Controller
{
    /**
     * Controller Action
     *
     * Displays the index page
     *
     * @param Request $request the request object
     * @return string the page HTML
    */
   public function indexAction(Request $request)
    {
        return $this->render('AppBundle:Front:index.html.twig', [
        ]);
    }
}
