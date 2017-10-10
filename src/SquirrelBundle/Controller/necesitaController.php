<?php

namespace SquirrelBundle\Controller;

use SquirrelBundle\Entity\necesita;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Necesitum controller.
 *
 */
class necesitaController extends Controller
{
    /**
     * Lists all necesitum entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $necesitas = $em->getRepository('SquirrelBundle:necesita')->findAll();

        return $this->render('necesita/index.html.twig', array(
            'necesitas' => $necesitas,
        ));
    }

    /**
     * Creates a new necesitum entity.
     *
     */
    public function newAction(Request $request)
    {
        $necesitum = new Necesitum();
        $form = $this->createForm('SquirrelBundle\Form\necesitaType', $necesitum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($necesitum);
            $em->flush();

            return $this->redirectToRoute('necesita_show', array('id' => $necesitum->getId()));
        }

        return $this->render('necesita/new.html.twig', array(
            'necesitum' => $necesitum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a necesitum entity.
     *
     */
    public function showAction(necesita $necesitum)
    {
        $deleteForm = $this->createDeleteForm($necesitum);

        return $this->render('necesita/show.html.twig', array(
            'necesitum' => $necesitum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing necesitum entity.
     *
     */
    public function editAction(Request $request, necesita $necesitum)
    {
        $deleteForm = $this->createDeleteForm($necesitum);
        $editForm = $this->createForm('SquirrelBundle\Form\necesitaType', $necesitum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('necesita_edit', array('id' => $necesitum->getId()));
        }

        return $this->render('necesita/edit.html.twig', array(
            'necesitum' => $necesitum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a necesitum entity.
     *
     */
    public function deleteAction(Request $request, necesita $necesitum)
    {
        $form = $this->createDeleteForm($necesitum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($necesitum);
            $em->flush();
        }

        return $this->redirectToRoute('necesita_index');
    }

    /**
     * Creates a form to delete a necesitum entity.
     *
     * @param necesita $necesitum The necesitum entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(necesita $necesitum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('necesita_delete', array('id' => $necesitum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
