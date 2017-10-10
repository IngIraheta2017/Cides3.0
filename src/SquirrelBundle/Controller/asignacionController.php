<?php

namespace SquirrelBundle\Controller;

use SquirrelBundle\Entity\asignacion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Asignacion controller.
 *
 */
class asignacionController extends Controller
{
    /**
     * Lists all asignacion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $asignacions = $em->getRepository('SquirrelBundle:asignacion')->findAll();

        return $this->render('asignacion/index.html.twig', array(
            'asignacions' => $asignacions,
        ));
    }

    /**
     * Creates a new asignacion entity.
     *
     */
    public function newAction(Request $request)
    {
        $asignacion = new Asignacion();
        $form = $this->createForm('SquirrelBundle\Form\asignacionType', $asignacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($asignacion);
            $em->flush();

            return $this->redirectToRoute('asignacion_show', array('id' => $asignacion->getId()));
        }

        return $this->render('asignacion/new.html.twig', array(
            'asignacion' => $asignacion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a asignacion entity.
     *
     */
    public function showAction(asignacion $asignacion)
    {
        $deleteForm = $this->createDeleteForm($asignacion);

        return $this->render('asignacion/show.html.twig', array(
            'asignacion' => $asignacion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing asignacion entity.
     *
     */
    public function editAction(Request $request, asignacion $asignacion)
    {
        $deleteForm = $this->createDeleteForm($asignacion);
        $editForm = $this->createForm('SquirrelBundle\Form\asignacionType', $asignacion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('asignacion_edit', array('id' => $asignacion->getId()));
        }

        return $this->render('asignacion/edit.html.twig', array(
            'asignacion' => $asignacion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a asignacion entity.
     *
     */
    public function deleteAction(Request $request, asignacion $asignacion)
    {
        $form = $this->createDeleteForm($asignacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($asignacion);
            $em->flush();
        }

        return $this->redirectToRoute('asignacion_index');
    }

    /**
     * Creates a form to delete a asignacion entity.
     *
     * @param asignacion $asignacion The asignacion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(asignacion $asignacion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('asignacion_delete', array('id' => $asignacion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
