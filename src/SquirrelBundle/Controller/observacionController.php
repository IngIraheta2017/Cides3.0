<?php

namespace SquirrelBundle\Controller;

use SquirrelBundle\Entity\observacion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Observacion controller.
 *
 */
class observacionController extends Controller
{
    /**
     * Lists all observacion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $observacions = $em->getRepository('SquirrelBundle:observacion')->findAll();

        return $this->render('observacion/index.html.twig', array(
            'observacions' => $observacions,
        ));
    }

    /**
     * Creates a new observacion entity.
     *
     */
    public function newAction(Request $request)
    {
        $observacion = new Observacion();
        $form = $this->createForm('SquirrelBundle\Form\observacionType', $observacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($observacion);
            $em->flush();

            return $this->redirectToRoute('observacion_show', array('id' => $observacion->getId()));
        }

        return $this->render('observacion/new.html.twig', array(
            'observacion' => $observacion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a observacion entity.
     *
     */
    public function showAction(observacion $observacion)
    {
        $deleteForm = $this->createDeleteForm($observacion);

        return $this->render('observacion/show.html.twig', array(
            'observacion' => $observacion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing observacion entity.
     *
     */
    public function editAction(Request $request, observacion $observacion)
    {
        $deleteForm = $this->createDeleteForm($observacion);
        $editForm = $this->createForm('SquirrelBundle\Form\observacionType', $observacion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('observacion_edit', array('id' => $observacion->getId()));
        }

        return $this->render('observacion/edit.html.twig', array(
            'observacion' => $observacion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a observacion entity.
     *
     */
    public function deleteAction(Request $request, observacion $observacion)
    {
        $form = $this->createDeleteForm($observacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($observacion);
            $em->flush();
        }

        return $this->redirectToRoute('observacion_index');
    }

    /**
     * Creates a form to delete a observacion entity.
     *
     * @param observacion $observacion The observacion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(observacion $observacion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('observacion_delete', array('id' => $observacion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
