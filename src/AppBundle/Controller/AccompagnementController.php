<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Accompagnement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Accompagnement controller.
 *
 * @Route("admin/accompagnement")
 */
class AccompagnementController extends Controller
{
    /**
     * Lists all accompagnement entities.
     *
     * @Route("/", name="accompagnement_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $accompagnements = $em->getRepository('AppBundle:Accompagnement')->findAll();

        return $this->render('admin/accompagnement/index.html.twig', array(
            'accompagnements' => $accompagnements,
        ));
    }

    /**
     * Creates a new accompagnement entity.
     *
     * @Route("/new", name="accompagnement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $accompagnement = new Accompagnement();
        $form = $this->createForm('AppBundle\Form\AccompagnementType', $accompagnement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($accompagnement);
            $em->flush();

            return $this->redirectToRoute('accompagnement_show', array('id' => $accompagnement->getId()));
        }

        return $this->render('admin/accompagnement/new.html.twig', array(
            'accompagnement' => $accompagnement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a accompagnement entity.
     *
     * @Route("/{id}", name="accompagnement_show")
     * @Method("GET")
     */
    public function showAction(Accompagnement $accompagnement)
    {
        $deleteForm = $this->createDeleteForm($accompagnement);

        return $this->render('admin/accompagnement/show.html.twig', array(
            'accompagnement' => $accompagnement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing accompagnement entity.
     *
     * @Route("/{id}/edit", name="accompagnement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Accompagnement $accompagnement)
    {
        $deleteForm = $this->createDeleteForm($accompagnement);
        $editForm = $this->createForm('AppBundle\Form\AccompagnementType', $accompagnement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('accompagnement_edit', array('id' => $accompagnement->getId()));
        }

        return $this->render('admin/accompagnement/edit.html.twig', array(
            'accompagnement' => $accompagnement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a accompagnement entity.
     *
     * @Route("/{id}", name="accompagnement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Accompagnement $accompagnement)
    {
        $form = $this->createDeleteForm($accompagnement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($accompagnement);
            $em->flush();
        }

        return $this->redirectToRoute('accompagnement_index');
    }

    /**
     * Creates a form to delete a accompagnement entity.
     *
     * @param Accompagnement $accompagnement The accompagnement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Accompagnement $accompagnement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('accompagnement_delete', array('id' => $accompagnement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
