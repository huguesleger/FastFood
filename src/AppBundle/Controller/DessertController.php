<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Dessert;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Dessert controller.
 *
 * @Route("admin/dessert")
 */
class DessertController extends Controller
{
    /**
     * Lists all dessert entities.
     *
     * @Route("/", name="dessert_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $desserts = $em->getRepository('AppBundle:Dessert')->findAll();

        return $this->render('admin/dessert/index.html.twig', array(
            'desserts' => $desserts,
        ));
    }

    /**
     * Creates a new dessert entity.
     *
     * @Route("/new", name="dessert_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $dessert = new Dessert();
        $form = $this->createForm('AppBundle\Form\DessertType', $dessert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dessert);
            $em->flush();

            return $this->redirectToRoute('dessert_show', array('id' => $dessert->getId()));
        }

        return $this->render('admin/dessert/new.html.twig', array(
            'dessert' => $dessert,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a dessert entity.
     *
     * @Route("/{id}", name="dessert_show")
     * @Method("GET")
     */
    public function showAction(Dessert $dessert)
    {
        $deleteForm = $this->createDeleteForm($dessert);

        return $this->render('admin/dessert/show.html.twig', array(
            'dessert' => $dessert,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing dessert entity.
     *
     * @Route("/{id}/edit", name="dessert_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Dessert $dessert)
    {
        $deleteForm = $this->createDeleteForm($dessert);
        $editForm = $this->createForm('AppBundle\Form\DessertType', $dessert);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dessert_edit', array('id' => $dessert->getId()));
        }

        return $this->render('admin/dessert/edit.html.twig', array(
            'dessert' => $dessert,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a dessert entity.
     *
     * @Route("/{id}", name="dessert_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Dessert $dessert)
    {
        $form = $this->createDeleteForm($dessert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($dessert);
            $em->flush();
        }

        return $this->redirectToRoute('dessert_index');
    }

    /**
     * Creates a form to delete a dessert entity.
     *
     * @param Dessert $dessert The dessert entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Dessert $dessert)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('dessert_delete', array('id' => $dessert->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
