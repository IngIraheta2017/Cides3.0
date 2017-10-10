<?php

namespace SquirrelBundle\Controller;

use SquirrelBundle\Entity\estadoProyecto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Estadoproyecto controller.
 *
 */
class estadoProyectoController extends Controller
{
    /**
     * Lists all estadoProyecto entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $estadoProyectos = $em->getRepository('SquirrelBundle:estadoProyecto')->findAll();

        return $this->render('estadoproyecto/index.html.twig', array(
            'estadoProyectos' => $estadoProyectos,
        ));
    }

    /**
     * Creates a new estadoProyecto entity.
     *
     */
    public function newAction(Request $request)
    {
        $estadoProyecto = new Estadoproyecto();
        $form = $this->createForm('SquirrelBundle\Form\estadoProyectoType', $estadoProyecto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($estadoProyecto);
            $em->flush();

            return $this->redirectToRoute('estadoproyecto_show', array('id' => $estadoProyecto->getId()));
        }

        return $this->render('estadoproyecto/new.html.twig', array(
            'estadoProyecto' => $estadoProyecto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a estadoProyecto entity.
     *
     */
    public function showAction(estadoProyecto $estadoProyecto)
    {
        $deleteForm = $this->createDeleteForm($estadoProyecto);

        return $this->render('estadoproyecto/show.html.twig', array(
            'estadoProyecto' => $estadoProyecto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing estadoProyecto entity.
     *
     */
    public function editAction(Request $request, estadoProyecto $estadoProyecto)
    {
        $deleteForm = $this->createDeleteForm($estadoProyecto);
        $editForm = $this->createForm('SquirrelBundle\Form\estadoProyectoType', $estadoProyecto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('estadoproyecto_edit', array('id' => $estadoProyecto->getId()));
        }

        return $this->render('estadoproyecto/edit.html.twig', array(
            'estadoProyecto' => $estadoProyecto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a estadoProyecto entity.
     *
     */
    public function deleteAction(Request $request, estadoProyecto $estadoProyecto)
    {
        $form = $this->createDeleteForm($estadoProyecto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($estadoProyecto);
            $em->flush();
        }

        return $this->redirectToRoute('estadoproyecto_index');
    }

    /**
     * Creates a form to delete a estadoProyecto entity.
     *
     * @param estadoProyecto $estadoProyecto The estadoProyecto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(estadoProyecto $estadoProyecto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estadoproyecto_delete', array('id' => $estadoProyecto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
