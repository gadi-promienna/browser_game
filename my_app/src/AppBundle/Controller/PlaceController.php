<?php
/**
 * Place controller
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Place;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Place controller.
 *
 * @Route("place")
 */
class PlaceController extends Controller
{
    /**
     * Lists all place entities.
     *
     * @Route("/",    name="place_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        
        $places = $this->get('app.repository.place')->findAll();

        return $this->render(
            'place/index.html.twig', array(
            'places' => $places,
            )
        );
    }


    /**
 * Show palces in actions menu.
 *
 * @param Animal $animal The animal entity
 * @Route("place/list", name="place_list")
 */
    public function listAction($animal)
    {
        

        $places = $this->get('app.repository.place')->findAll();

        return $this->render(
            'place/list.html.twig', array(
            'places' => $places, 'animal' => $animal,
            )
        );
    }
    /**
     * Creates a new place entity.
     *
     * @param          \Symfony\Component\HttpFoundation\Request $request HTTP Request
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     * @Route("/new",  name="place_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $place = new Place();
        $form = $this->createForm('AppBundle\Form\PlaceType', $place);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->get('app.repository.place')->save($place);

            return $this->redirectToRoute('place_show', array('id' => $place->getId()));
        }

        return $this->render(
            'place/new.html.twig', array(
            'place' => $place,
            'form' => $form->createView(),
            )
        );
    }

    /**
     * Finds and displays a place entity.
     *
     * @param          Place $place The place entity
     * @Route("/{id}", name="place_show")
     * @Method("GET")
     */
    public function showAction(Place $place)
    {
        $deleteForm = $this->createDeleteForm($place);

        return $this->render(
            'place/show.html.twig', array(
            'place' => $place,
            'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Displays a form to edit an existing place entity.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP
     * @param  Place $place The place entity
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     * @Route("/{id}/edit", name="place_edit")
     * @Method({"GET",      "POST"})
     */
    public function editAction(Request $request, Place $place)
    {
        $deleteForm = $this->createDeleteForm($place);
        $editForm = $this->createForm('AppBundle\Form\PlaceType', $place);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('place_edit', array('id' => $place->getId()));
        }

        return $this->render(
            'place/edit.html.twig', array(
            'place' => $place,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Deletes a place entity.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request
     * @param  Place $place The place entity
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     * @Route("/{id}", name="place_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Place $place)
    {
        $form = $this->createDeleteForm($place);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
             $this->get('app.repository.place')->delete($place);
        }

        return $this->redirectToRoute('place_index');
    }

    /**
     * Creates a form to delete a place entity.
     *
     * @param Place $place The place entity
     * 
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Place $place)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('place_delete', array('id' => $place->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
