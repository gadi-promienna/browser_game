<?php
/**
 * Default controller.
 */

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;


/**
 * Default user controller.
 */
class DefaultController extends Controller
{
    /**
     * Index action.
     *
     * @Route("/", name = "main")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig');
    }
}
