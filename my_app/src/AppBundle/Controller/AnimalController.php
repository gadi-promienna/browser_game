<?php
/**
 * Animal controller
 */


namespace AppBundle\Controller;

use AppBundle\Entity\Animal;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
;

/**
 * Animal controller.
 *
 * @Route("animal")
 */
class AnimalController extends Controller
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
     *     name="animal_index",
     * )
     * @Route(
     *     "/page/{page}",
     *     requirements={"page": "[1-9]\d*"},
     *     name="animal_index_paginated",
     * )
     * @Method("GET")
     */


    public function indexAction($page)
    {

        $animals = $this->get('app.repository.animal')->findAllPaginated($page);

        return $this->render(
            'animal/index.html.twig', array(
            'animals' => $animals,
            )
        );
    }

        /**
     * Give animal password.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request
     * @Route("/find_animal", name="find_animal")
     * @Method({"GET",        "POST"})
     */
    public function findAction(Request $request)
    {
        $form = $this->createForm('AppBundle\Form\FindAnimalType');
        $form->handleRequest($request);
        $password=$form->get('password')->getData();
        $name = $form->get('name')->getData();
        if ($form->isSubmitted() && $form->isValid()) {
            
            $animals = $this->get('app.repository.animal');
            $animal = $animals->findOneByName($name);
            
            if($animal!=null) { 
                $animal_password = $animal->getPassword();
                if($animal_password==$password) {  
                            
                       $this->get('session')->set('animal_access', $animal);
                       return $this->render(
                           'animal/show.html.twig', array(
                            'animal' => $animal)
                       );
                }
                else
                   {
                        $this->addFlash('error', 'Hasło do opieki nad stworkiem jest inne');
                            
                }
            }
            else
                  {

                     $this->addFlash('error', 'Stworek o takim imieniu nie istnieje.');
            }
        }


        return $this->render(
            'animal/find_animal.html.twig', array(
            'form' => $form->createView())
        );
    }

    /**
     * Creates a new animal entity.
     *
     * @param          \Symfony\Component\HttpFoundation\Request $request HTTP Request
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     *
     * @Route("/new",  name="animal_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $animal = new Animal();
        $form = $this->createForm('AppBundle\Form\AnimalType', $animal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->get('session')->set('animal_access', $animal);
            $animal->setEnergy(10);
            $animal->setHapiness(5);
            $animal->setIntelligence(1);
            $animal->setStrength(1);
            $owner = $this->container->get('security.context')->getToken()->getUser();
            $animal->setOwner($owner);
            $animal->setSleepiness(1);
            $log = $animal->getName()." został utworzony przez ".$this->container->get('security.context')->getToken()->getUsername();
            $this->get('app.repository.logs')->make_log($log);
             $this->get('app.repository.animal')->save($animal);

            return $this->redirectToRoute('animal_show', array('id' => $animal->getId()));
        }

        return $this->render(
            'animal/new.html.twig', array(
            'animal' => $animal,
            'form' => $form->createView(),
            )
        );
    }

    /**
     * Finds and displays a animal entity.
     *
     * @param          Animal $animal The animal entity
     * @Route("/{id}", name="animal_show")
     * @Method("GET")
     */
    public function showAction(Animal $animal)
    {
        $deleteForm = $this->createDeleteForm($animal);

        return $this->render(
            'animal/show.html.twig', array(
            'animal' => $animal,
            'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Displays a form to edit an existing animal entity.
     *
     * @param               \Symfony\Component\HttpFoundation\Request $request HTTP Request
     * @param               Animal                                    $animal  The animal entity
    * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     * @Route("/{id}/edit", name="animal_edit")
     * @Method({"GET",      "POST"})
     */
    public function editAction(Request $request, Animal $animal)
    {
        $deleteForm = $this->createDeleteForm($animal);
        $editForm = $this->createForm('AppBundle\Form\AnimalType', $animal);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('animal_edit', array('id' => $animal->getId()));
        }

        return $this->render(
            'animal/edit.html.twig', array(
            'animal' => $animal,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Deletes a animal entity.
     *
     * @param            \Symfony\Component\HttpFoundation\Request $request HTTP Request
     * @param            Animal                                    $animal  The animal entity
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     * @Route("/{id}",   name="animal_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Animal $animal)
    {
        $form = $this->createDeleteForm($animal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
             $this->get('app.repository.animal')->delete($animal);
        }

        return $this->redirectToRoute('animal_index');
    }





    /**
     * Creates a form to delete a animal entity.
     *
     * @param Animal $animal The animal entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Animal $animal)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('animal_delete', array('id' => $animal->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * Feed animal.
     *
     * @param Animal $animal The animal entity
     * @param Food   $food   The food entity
     * @Route("/feed/{animal}/{food}", name="feed_animal")
     */
    public function feed_animal($animal, $food)
    {
          $em = $this->getDoctrine()->getManager();
          $animals = $this->get('app.repository.animal');
          $animal = $animals->findOneById($animal);
          $foods = $this->get('app.repository.food');
          $food = $foods->findOneById($food);
        if($animal->getEnergy()<20) {
                 
            $changes =$this->get('app.repository.changes')->energyChange($animal, $food);
        }
        else
            {
            $changes =$this->get('app.repository.changes')->widthChange($animal, $food);

            $changes =$this->get('app.repository.changes')->heightChange($animal, $food);
        }

            $changes =$this->get('app.repository.changes')->timeChanges($animal);
            $log = $animal->getName()." dostał do zjedzenia ".$food->getName()." od użytkownika ".$this->container->get('security.context')->getToken()->getUsername();
            $this->get('app.repository.logs')->make_log($log);

            $em->flush();
            return $this->redirectToRoute('animal_show', array('id' => $animal->getId()));

    }


    /**
     * Deletes without form.
  *
     * @param                \Symfony\Component\HttpFoundation\Request $request HTTP Request
     * @param                Animal                                    $animal  The animal entity
     * @Route("delete/{id}", name="simple_delete_animal")
     * @Method({"GET",       "DELETE"})
     */

    public function simpleDeleteAction(Request $request, Animal $animal)
    {


            $em = $this->getDoctrine()->getManager();
            $em->remove($animal);
            $em->flush();

        return $this->redirectToRoute('animal_index');
    }


    /**
     * Take walk your animal. 
     *
     * @param Animal $animal The animal entity
     * @param Place  $place  The place entity
     * @Route("/walk/{animal}/{place}", name="walk_animal")
     */
    public function walkYourAnimal($animal, $place)
    {
          $em = $this->getDoctrine()->getManager();
          $animals = $this->get('app.repository.animal');
          $animal = $animals->findOneById($animal);
          $places = $this->get('app.repository.place');
          $place = $places->findOneById($place);
        if($animal->getEnergy()>5) {
                 
            $changes =$this->get('app.repository.changes')->energyChange($animal, $place);
            $changes =$this->get('app.repository.changes')->strengthChange($animal, $place);
        }
        else
            {
            $changes =$this->get('app.repository.changes')->widthChange($animal, $place);

        }

            $changes =$this->get('app.repository.changes')->timeChanges($animal);
            $log = $animal->getName()." został wzięty na spacer do: ".$place->getName()." przez użytkownika ".$this->container->get('security.context')->getToken()->getUsername();
            $this->get('app.repository.logs')->make_log($log);
            $em->flush();
            return $this->redirectToRoute('animal_show', array('id' => $animal->getId()));

    }

      /**
     * Play with your animal.
     *
     * @param Animal $animal The animal entity
     * @param Toy    $toy    The toy entity
     * @Route("/play/{animal}/{toy}", name="play_toy")
     */
    public function playToy($animal, $toy)
    {
          $em = $this->getDoctrine()->getManager();
          $animals = $this->get('app.repository.animal');
          $animal = $animals->findOneById($animal);
          $toys = $this->get('app.repository.toy');
          $toy = $toys->findOneById($toy);
        if($animal->getEnergy()>5 && $animal->getHapiness()<30 ) {
                 
            $changes =$this->get('app.repository.changes')->hapinessChange($animal, $toy);
            $changes =$this->get('app.repository.changes')->intelligenceChange($animal, $toy);
        }
            

            $log = $animal->getName()." dostał do zabawy ".$toy->getName()." od użytkownika ".$this->container->get('security.context')->getToken()->getUsername();
            $this->get('app.repository.logs')->make_log($log);

            $em->flush();
            return $this->redirectToRoute('animal_show', array('id' => $animal->getId()));

    }

       /**
     * Pet your animal.
     *
     * @param Animal $animal The animal entity
     * @Route("/pet/{animal}", name="pet_animal")
     */

    public function petAnimal($animal)
    {
          $em = $this->getDoctrine()->getManager();
          $animals = $this->get('app.repository.animal');
          $animal = $animals->findOneById($animal);
          $height = $animal->getHeight();
          $height= $height - 2;
          $animal -> setHeight($height);
          $happiness = $animal->getHapiness();
        if ($happiness <= 30) {
             $happiness= $happiness + 2;
        }

            $animal -> setHapiness($happiness);
            $energy = $animal->getEnergy();
            $energy = $energy - 3;
            $animal -> setEnergy($energy);
            $log = $animal->getName()." został pogłaskany przez ".$this->container->get('security.context')->getToken()->getUsername();
            $this->get('app.repository.logs')->make_log($log);
            $em->flush();
            return $this->redirectToRoute('animal_show', array('id' => $animal->getId()));

    }


}
