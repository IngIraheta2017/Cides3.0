<?php

namespace SquirrelBundle\Controller;

use SquirrelBundle\Entity\categoriaProyecto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Categoriaproyecto controller.
 *
 */
class categoriaProyectoController extends Controller
{
    /**
     * Lists all categoriaProyecto entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categoriaProyectos = $em->getRepository('SquirrelBundle:categoriaProyecto')->findAll();

        return $this->render('categoriaproyecto/index.html.twig', array(
            'categoriaProyectos' => $categoriaProyectos,
        ));
    }

    /**
     * Creates a new categoriaProyecto entity.
     *
     */
    public function newAction(Request $request)
    {
        $categoriaProyecto = new Categoriaproyecto();
        $form = $this->createForm('SquirrelBundle\Form\categoriaProyectoType', $categoriaProyecto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categoriaProyecto);
            $em->flush();

            return $this->redirectToRoute('categoriaproyecto_show', array('id' => $categoriaProyecto->getId()));
        }

        return $this->render('categoriaproyecto/new.html.twig', array(
            'categoriaProyecto' => $categoriaProyecto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a categoriaProyecto entity.
     *
     */
    public function showAction(categoriaProyecto $categoriaProyecto)
    {
        $deleteForm = $this->createDeleteForm($categoriaProyecto);

        return $this->render('categoriaproyecto/show.html.twig', array(
            'categoriaProyecto' => $categoriaProyecto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing categoriaProyecto entity.
     *
     */
    public function editAction(Request $request, categoriaProyecto $categoriaProyecto)
    {
        $deleteForm = $this->createDeleteForm($categoriaProyecto);
        $editForm = $this->createForm('SquirrelBundle\Form\categoriaProyectoType', $categoriaProyecto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categoriaproyecto_edit', array('id' => $categoriaProyecto->getId()));
        }

        return $this->render('categoriaproyecto/edit.html.twig', array(
            'categoriaProyecto' => $categoriaProyecto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a categoriaProyecto entity.
     *
     */
    public function deleteAction(Request $request, categoriaProyecto $categoriaProyecto)
    {
        $form = $this->createDeleteForm($categoriaProyecto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($categoriaProyecto);
            $em->flush();
        }

        return $this->redirectToRoute('categoriaproyecto_index');
    }

    /**
     * Creates a form to delete a categoriaProyecto entity.
     *
     * @param categoriaProyecto $categoriaProyecto The categoriaProyecto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(categoriaProyecto $categoriaProyecto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('categoriaproyecto_delete', array('id' => $categoriaProyecto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
