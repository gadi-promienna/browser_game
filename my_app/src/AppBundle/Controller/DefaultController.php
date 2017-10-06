<?php
/**
 * Default controller
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;


/**
 * Default controller.
 *
 * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request
 */

class DefaultController extends Controller
{
    /**
     * Index action.
     *
     * @Route("/", name="root")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig');
    }
}
