<?php
/**
 * User controller.
 */

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
    * Index action.
     *
     * @param integer $page Current page number
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     *
     * @Route(
     *     "/",
     *     defaults={"page": 1},
     *     name="user_index",
     * )
     * @Route(
     *     "/page/{page}",
     *     requirements={"page": "[1-9]\d*"},
     *     name="user_index_paginated",
     * )
     * @Method("GET")
     */
    public function indexAction($page)
    {
        $users = $this->container->get('app.repository.user')->findAllPaginated($page);

        return $this->render(
            'user/index.html.twig', array(
            'users' => $users,
            )
        );
    }

    /**
     * Creates a new user entity.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request
     * @return         \Symfony\Component\HttpFoundation\Response HTTP Response
     * @Route("/new",  name="user_new")
     * @Method({"GET", "POST"})
     */

    public function newAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm('UserBundle\Form\NewType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setEnabled(true);
            
             $this ->container-> get('app.repository.user')->save($user);
            
            return $this->redirectToRoute('user_index');
        }

        return $this->render(
            'user/new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
            )
        );
    }

    /**
     * Finds and displays a user entity.
     *
     * @param  User $user The user entity
     * @Route("/{id}", name="user_show")
     * @Method("GET")
     */
    public function showAction(User $user)
    {
        $deleteForm = $this->createDeleteForm($user);

        return $this->render(
            'user/show.html.twig', array(
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Displays a form to edit an existing user entity.
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request
     * @param User $user The user entity
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     * @return User $user The user entity
     * @Route("/{id}/edit", name="user_edit")
     * @Method({"GET",      "POST"})
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
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request
     * @param  User $user    The user entity
     * @return  \Symfony\Component\HttpFoundation\Response HTTP Response
     * @Route("/{id}/password", name="user_edit_password")
     * @Method({"GET",          "POST"})
     */
    public function editPasswordAction(Request $request, User $user)
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
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request
     * @param User  $user   The user entity
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     * @Route("/{id}",   name="user_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, User $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        return $this->redirectToRoute('user_index');
    }


    /**
     * Deletes without form.
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request
     * @param User $user The user entity
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     * @Route("delete/{id}", name="simple_delete_user")
     * @Method({"GET",       "DELETE"})
     */

    public function simpleDeleteAction(Request $request, user $user)
    {

        $this->container->get('fos_user.user_manager')->deleteUser($user);
       
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
            ->getForm();
    }
}
