<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Boisson;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Boisson controller.
 *
 * @Route("admin/boisson")
 */
class BoissonController extends Controller
{
    /**
     * Lists all boisson entities.
     *
     * @Route("/", name="boisson_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $boissons = $em->getRepository('AppBundle:Boisson')->findAll();

        return $this->render('admin/boisson/index.html.twig', array(
            'boissons' => $boissons,
        ));
    }

    /**
     * Creates a new boisson entity.
     *
     * @Route("/new", name="boisson_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $boisson = new Boisson();
        $form = $this->createForm('AppBundle\Form\BoissonType', $boisson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($boisson);
            $em->flush();

            return $this->redirectToRoute('boisson_show', array('id' => $boisson->getId()));
        }

        return $this->render('admin/boisson/new.html.twig', array(
            'boisson' => $boisson,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a boisson entity.
     *
     * @Route("/{id}", name="boisson_show")
     * @Method("GET")
     */
    public function showAction(Boisson $boisson)
    {
        $deleteForm = $this->createDeleteForm($boisson);

        return $this->render('admin/boisson/show.html.twig', array(
            'boisson' => $boisson,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing boisson entity.
     *
     * @Route("/{id}/edit", name="boisson_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Boisson $boisson)
    {
        $deleteForm = $this->createDeleteForm($boisson);
        $editForm = $this->createForm('AppBundle\Form\BoissonType', $boisson);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('boisson_edit', array('id' => $boisson->getId()));
        }

        return $this->render('admin/boisson/edit.html.twig', array(
            'boisson' => $boisson,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a boisson entity.
     *
     * @Route("/{id}", name="boisson_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Boisson $boisson)
    {
        $form = $this->createDeleteForm($boisson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($boisson);
            $em->flush();
        }

        return $this->redirectToRoute('boisson_index');
    }

    /**
     * Creates a form to delete a boisson entity.
     *
     * @param Boisson $boisson The boisson entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Boisson $boisson)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('boisson_delete', array('id' => $boisson->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
