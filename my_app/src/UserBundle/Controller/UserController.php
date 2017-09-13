<?php

namespace UserBundle\Controller;

use UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * User controller.
 *
 * @Route("user")
 */
class UserController extends Controller
{
    /**
     * Lists all user entities.
     *
     * @Route("/", name="user_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $users = $this->container->get('fos_user.user_manager')->findUsers();

        #$users = $em->getRepository('UserBundle:User')->findAll();

        return $this->render('user/index.html.twig', array(
            'users' => $users,
        ));
    }

    /**
     * Creates a new user entity.
     *
     * @Route("/new", name="user_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm('UserBundle\Form\NewType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $user->setEnabled(true);
            $em->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a user entity.
     *
     * @Route("/{id}", name="user_show")
     * @Method("GET")
     */
    public function showAction(User $user)
    {
        $deleteForm = $this->createDeleteForm($user);

        return $this->render('user/show.html.twig', array(
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing user entity.
     *
     * @Route("/{id}/edit", name="user_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, User $user)
    {
        
         $form = $this->createForm('UserBundle\Form\UserType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
             $this->container->get('fos_user.user_manager')->updateUser($user);
            $this->addFlash('success', 'message.created_successfully');

            return $this->redirectToRoute('user_index');
        }

        return $this->render(
            'user/edit.html.twig',
            ['user' => $user, 'form' => $form->createView()]
        );
    }


    /**
     * Displays a form to edit an existing user entity.
     *
     * @Route("/{id}/password", name="user_edit_password")
     * @Method({"GET", "POST"})
     */
    public function edit_passwordAction(Request $request, User $user)
    {
        
         $form = $this->createForm('UserBundle\Form\PasswordType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
             $this->container->get('fos_user.user_manager')->updateUser($user);
            $this->addFlash('success', 'message.created_successfully');

            return $this->redirectToRoute('user_index');
        }

        return $this->render(
            'user/edit.html.twig',
            ['user' => $user, 'form' => $form->createView()]
        );
    }

    /**
     * Deletes a user entity.
     *
     * @Route("/{id}", name="user_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, User $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('user_index');
    }

    /**
     * Creates a form to delete a user entity.
     *
     * @param User $user The user entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Deletes without form.
     *
     * @Route("delete/{id}", name="simple_delete_user")
     * @Method({"GET", "DELETE"})
     */

    public function simple_delete_Action(Request $request, user $user)
    {


            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();

        return $this->redirectToRoute('user_index');
    }

}
