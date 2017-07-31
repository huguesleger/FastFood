<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CategorieBoisson;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Categorieboisson controller.
 *
 * @Route("admin/categorieboisson")
 */
class CategorieBoissonController extends Controller
{
    /**
     * Lists all categorieBoisson entities.
     *
     * @Route("/", name="categorieboisson_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categorieBoissons = $em->getRepository('AppBundle:CategorieBoisson')->findAll();

        return $this->render('admin/categorieboisson/index.html.twig', array(
            'categorieBoissons' => $categorieBoissons,
        ));
    }

    /**
     * Creates a new categorieBoisson entity.
     *
     * @Route("/new", name="categorieboisson_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $categorieBoisson = new Categorieboisson();
        $form = $this->createForm('AppBundle\Form\CategorieBoissonType', $categorieBoisson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorieBoisson);
            $em->flush();

            return $this->redirectToRoute('categorieboisson_show', array('id' => $categorieBoisson->getId()));
        }

        return $this->render('admin/categorieboisson/new.html.twig', array(
            'categorieBoisson' => $categorieBoisson,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a categorieBoisson entity.
     *
     * @Route("/{id}", name="categorieboisson_show")
     * @Method("GET")
     */
    public function showAction(CategorieBoisson $categorieBoisson)
    {
        $deleteForm = $this->createDeleteForm($categorieBoisson);

        return $this->render('admin/categorieboisson/show.html.twig', array(
            'categorieBoisson' => $categorieBoisson,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing categorieBoisson entity.
     *
     * @Route("/{id}/edit", name="categorieboisson_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CategorieBoisson $categorieBoisson)
    {
        $deleteForm = $this->createDeleteForm($categorieBoisson);
        $editForm = $this->createForm('AppBundle\Form\CategorieBoissonType', $categorieBoisson);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categorieboisson_edit', array('id' => $categorieBoisson->getId()));
        }

        return $this->render('admin/categorieboisson/edit.html.twig', array(
            'categorieBoisson' => $categorieBoisson,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a categorieBoisson entity.
     *
     * @Route("/{id}", name="categorieboisson_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CategorieBoisson $categorieBoisson)
    {
        $form = $this->createDeleteForm($categorieBoisson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($categorieBoisson);
            $em->flush();
        }

        return $this->redirectToRoute('categorieboisson_index');
    }

    /**
     * Creates a form to delete a categorieBoisson entity.
     *
     * @param CategorieBoisson $categorieBoisson The categorieBoisson entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CategorieBoisson $categorieBoisson)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('categorieboisson_delete', array('id' => $categorieBoisson->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
