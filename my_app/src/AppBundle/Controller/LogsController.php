<?php
/**
 * Logs controller
 */

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
     * @Route("/",    name="logs_index")
     * @Method("GET")
     */
    public function indexAction()
    {
       

        $logs = $this->get('app.repository.logs')->findBy([], ['date' => 'DESC']);

        return $this->render(
            'logs/index.html.twig', array(
            'logs' => $logs,
            )
        );
    }

     /**
     * Delete without form.
      *
     * @param                Logs $log The log entity
     * @Route("delete/{id}", name="simple_delete_log")
     * @Method({"GET",       "DELETE"})
     */

    public function simpleDeleteAction(Logs $log)
    {


           $this -> get('app.repository.logs')-> delete($log);
        return $this->redirectToRoute('logs_index');
    }


}