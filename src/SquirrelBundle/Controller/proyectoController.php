<?php

namespace SquirrelBundle\Controller;

use SquirrelBundle\Entity\proyecto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Proyecto controller.
 *
 */
class proyectoController extends Controller
{
    /**
     * Lists all proyecto entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $proyectos = $em->getRepository('SquirrelBundle:proyecto')->findAll();

        return $this->render('proyecto/index.html.twig', array(
            'proyectos' => $proyectos,
        ));
    }

    /**
     * Creates a new proyecto entity.
     *
     */
    public function newAction(Request $request)
    {
        $proyecto = new Proyecto();
        $form = $this->createForm('SquirrelBundle\Form\proyectoType', $proyecto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($proyecto);
            $em->flush();

            return $this->redirectToRoute('proyecto_show', array('id' => $proyecto->getId()));
        }

        return $this->render('proyecto/new.html.twig', array(
            'proyecto' => $proyecto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a proyecto entity.
     *
     */
    public function showAction(proyecto $proyecto)
    {
        $deleteForm = $this->createDeleteForm($proyecto);

        return $this->render('proyecto/show.html.twig', array(
            'proyecto' => $proyecto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing proyecto entity.
     *
     */
    public function editAction(Request $request, proyecto $proyecto)
    {
        $deleteForm = $this->createDeleteForm($proyecto);
        $editForm = $this->createForm('SquirrelBundle\Form\proyectoType', $proyecto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('proyecto_edit', array('id' => $proyecto->getId()));
        }

        return $this->render('proyecto/edit.html.twig', array(
            'proyecto' => $proyecto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a proyecto entity.
     *
     */
    public function deleteAction(Request $request, proyecto $proyecto)
    {
        $form = $this->createDeleteForm($proyecto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($proyecto);
            $em->flush();
        }

        return $this->redirectToRoute('proyecto_index');
    }

    /**
     * Creates a form to delete a proyecto entity.
     *
     * @param proyecto $proyecto The proyecto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(proyecto $proyecto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('proyecto_delete', array('id' => $proyecto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
