<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Logs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Logs controller.
 *
 * @Route("logs")
 */
class LogsController extends Controller
{

   /**
     * Lists all logs entities.
     *
     * @Route("/", name="logs_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $logs = $em->getRepository('AppBundle:Logs')->findBy([], ['date' => 'DESC']);

        return $this->render('logs/index.html.twig', array(
            'logs' => $logs,
        ));
    }

     /**
     * Delete without form.
     *
     * @Route("delete/{id}", name="simple_delete_log")
     * @Method({"GET", "DELETE"})
     */

    public function simple_delete_Action(Request $request, Logs $log)
    {


            $em = $this->getDoctrine()->getManager();
            $em->remove($log);
            $em->flush();
			return $this->redirectToRoute('logs_index');
    }


}