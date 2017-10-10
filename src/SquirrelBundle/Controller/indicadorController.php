<?php

namespace SquirrelBundle\Controller;

use SquirrelBundle\Entity\indicador;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Indicador controller.
 *
 */
class indicadorController extends Controller
{
    /**
     * Lists all indicador entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $indicadors = $em->getRepository('SquirrelBundle:indicador')->findAll();

        return $this->render('indicador/index.html.twig', array(
            'indicadors' => $indicadors,
        ));
    }

    /**
     * Creates a new indicador entity.
     *
     */
    public function newAction(Request $request)
    {
        $indicador = new Indicador();
        $form = $this->createForm('SquirrelBundle\Form\indicadorType', $indicador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($indicador);
            $em->flush();

            return $this->redirectToRoute('indicador_show', array('id' => $indicador->getId()));
        }

        return $this->render('indicador/new.html.twig', array(
            'indicador' => $indicador,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a indicador entity.
     *
     */
    public function showAction(indicador $indicador)
    {
        $deleteForm = $this->createDeleteForm($indicador);

        return $this->render('indicador/show.html.twig', array(
            'indicador' => $indicador,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing indicador entity.
     *
     */
    public function editAction(Request $request, indicador $indicador)
    {
        $deleteForm = $this->createDeleteForm($indicador);
        $editForm = $this->createForm('SquirrelBundle\Form\indicadorType', $indicador);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('indicador_edit', array('id' => $indicador->getId()));
        }

        return $this->render('indicador/edit.html.twig', array(
            'indicador' => $indicador,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a indicador entity.
     *
     */
    public function deleteAction(Request $request, indicador $indicador)
    {
        $form = $this->createDeleteForm($indicador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($indicador);
            $em->flush();
        }

        return $this->redirectToRoute('indicador_index');
    }

    /**
     * Creates a form to delete a indicador entity.
     *
     * @param indicador $indicador The indicador entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(indicador $indicador)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('indicador_delete', array('id' => $indicador->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
