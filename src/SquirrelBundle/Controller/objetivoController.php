<?php

namespace SquirrelBundle\Controller;

use SquirrelBundle\Entity\objetivo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Objetivo controller.
 *
 */
class objetivoController extends Controller
{
    /**
     * Lists all objetivo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $objetivos = $em->getRepository('SquirrelBundle:objetivo')->findAll();

        return $this->render('objetivo/index.html.twig', array(
            'objetivos' => $objetivos,
        ));
    }

    /**
     * Creates a new objetivo entity.
     *
     */
    public function newAction(Request $request)
    {
        $objetivo = new Objetivo();
        $form = $this->createForm('SquirrelBundle\Form\objetivoType', $objetivo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($objetivo);
            $em->flush();

            return $this->redirectToRoute('objetivo_show', array('id' => $objetivo->getId()));
        }

        return $this->render('objetivo/new.html.twig', array(
            'objetivo' => $objetivo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a objetivo entity.
     *
     */
    public function showAction(objetivo $objetivo)
    {
        $deleteForm = $this->createDeleteForm($objetivo);

        return $this->render('objetivo/show.html.twig', array(
            'objetivo' => $objetivo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing objetivo entity.
     *
     */
    public function editAction(Request $request, objetivo $objetivo)
    {
        $deleteForm = $this->createDeleteForm($objetivo);
        $editForm = $this->createForm('SquirrelBundle\Form\objetivoType', $objetivo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('objetivo_edit', array('id' => $objetivo->getId()));
        }

        return $this->render('objetivo/edit.html.twig', array(
            'objetivo' => $objetivo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a objetivo entity.
     *
     */
    public function deleteAction(Request $request, objetivo $objetivo)
    {
        $form = $this->createDeleteForm($objetivo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($objetivo);
            $em->flush();
        }

        return $this->redirectToRoute('objetivo_index');
    }

    /**
     * Creates a form to delete a objetivo entity.
     *
     * @param objetivo $objetivo The objetivo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(objetivo $objetivo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('objetivo_delete', array('id' => $objetivo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
