<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Toy;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Toy controller.
 *
 * @Route("toy")
 */
class ToyController extends Controller
{
    /**
     * Lists all toy entities.
     *
     * @Route("/", name="toy_index")
     * @Method("GET")
     */
    public function indexAction()
    {

        $toys = $this->get('app.repository.toy')->findAll();

        return $this->render('toy/index.html.twig', array(
            'toys' => $toys,
        ));
    }

    /**
 * @Route("toy/list", name="toy_list")
 */
        public function listAction($animal)
    {
        

        $toys = $this->get('app.repository.toy')->findAll();

        return $this->render('toy/list.html.twig', array(
            'toys' => $toys, 'animal' => $animal,
        ));
    }

    /**
     * Creates a new toy entity.
     *
     * @Route("/new", name="toy_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $toy = new Toy();
        $form = $this->createForm('AppBundle\Form\ToyType', $toy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
             $this->get('app.repository.toy')->save($toy);
            return $this->redirectToRoute('toy_show', array('id' => $toy->getId()));
        }

        return $this->render('toy/new.html.twig', array(
            'toy' => $toy,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a toy entity.
     *
     * @Route("/{id}", name="toy_show")
     * @Method("GET")
     */
    public function showAction(Toy $toy)
    {
        $deleteForm = $this->createDeleteForm($toy);

        return $this->render('toy/show.html.twig', array(
            'toy' => $toy,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing toy entity.
     *
     * @Route("/{id}/edit", name="toy_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Toy $toy)
    {
        $deleteForm = $this->createDeleteForm($toy);
        $editForm = $this->createForm('AppBundle\Form\ToyType', $toy);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('toy_edit', array('id' => $toy->getId()));
        }

        return $this->render('toy/edit.html.twig', array(
            'toy' => $toy,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a toy entity.
     *
     * @Route("/{id}", name="toy_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Toy $toy)
    {
        $form = $this->createDeleteForm($toy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
             $this->get('app.repository.toy')->save($toy);
        }

        return $this->redirectToRoute('toy_index');
    }

    /**
     * Creates a form to delete a toy entity.
     *
     * @param Toy $toy The toy entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Toy $toy)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('toy_delete', array('id' => $toy->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
