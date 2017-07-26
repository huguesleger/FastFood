<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BurgerSpecial;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Burgerspecial controller.
 *
 * @Route("admin/burgerspecial")
 */
class BurgerSpecialController extends Controller
{
    /**
     * Lists all burgerSpecial entities.
     *
     * @Route("/", name="burgerspecial_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $burgerSpecials = $em->getRepository('AppBundle:BurgerSpecial')->findAll();

        return $this->render('admin/burgerspecial/index.html.twig', array(
            'burgerSpecials' => $burgerSpecials,
        ));
    }

    /**
     * Creates a new burgerSpecial entity.
     *
     * @Route("/new", name="burgerspecial_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $burgerSpecial = new Burgerspecial();
        $form = $this->createForm('AppBundle\Form\BurgerSpecialType', $burgerSpecial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($burgerSpecial);
            $em->flush();

            return $this->redirectToRoute('burgerspecial_show', array('id' => $burgerSpecial->getId()));
        }

        return $this->render('admin/burgerspecial/new.html.twig', array(
            'burgerSpecial' => $burgerSpecial,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a burgerSpecial entity.
     *
     * @Route("/{id}", name="burgerspecial_show")
     * @Method("GET")
     */
    public function showAction(BurgerSpecial $burgerSpecial)
    {
        $deleteForm = $this->createDeleteForm($burgerSpecial);

        return $this->render('admin/burgerspecial/show.html.twig', array(
            'burgerSpecial' => $burgerSpecial,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing burgerSpecial entity.
     *
     * @Route("/{id}/edit", name="burgerspecial_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, BurgerSpecial $burgerSpecial)
    {
        $deleteForm = $this->createDeleteForm($burgerSpecial);
        $editForm = $this->createForm('AppBundle\Form\BurgerSpecialType', $burgerSpecial);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('burgerspecial_edit', array('id' => $burgerSpecial->getId()));
        }

        return $this->render('admin/burgerspecial/edit.html.twig', array(
            'burgerSpecial' => $burgerSpecial,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a burgerSpecial entity.
     *
     * @Route("/{id}", name="burgerspecial_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, BurgerSpecial $burgerSpecial)
    {
        $form = $this->createDeleteForm($burgerSpecial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($burgerSpecial);
            $em->flush();
        }

        return $this->redirectToRoute('burgerspecial_index');
    }

    /**
     * Creates a form to delete a burgerSpecial entity.
     *
     * @param BurgerSpecial $burgerSpecial The burgerSpecial entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(BurgerSpecial $burgerSpecial)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('burgerspecial_delete', array('id' => $burgerSpecial->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
