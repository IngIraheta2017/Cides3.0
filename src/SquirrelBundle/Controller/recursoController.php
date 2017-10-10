<?php

namespace SquirrelBundle\Controller;

use SquirrelBundle\Entity\recurso;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Recurso controller.
 *
 */
class recursoController extends Controller
{
    /**
     * Lists all recurso entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $recursos = $em->getRepository('SquirrelBundle:recurso')->findAll();

        return $this->render('recurso/index.html.twig', array(
            'recursos' => $recursos,
        ));
    }

    /**
     * Creates a new recurso entity.
     *
     */
    public function newAction(Request $request)
    {
        $recurso = new Recurso();
        $form = $this->createForm('SquirrelBundle\Form\recursoType', $recurso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($recurso);
            $em->flush();

            return $this->redirectToRoute('recurso_show', array('id' => $recurso->getId()));
        }

        return $this->render('recurso/new.html.twig', array(
            'recurso' => $recurso,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a recurso entity.
     *
     */
    public function showAction(recurso $recurso)
    {
        $deleteForm = $this->createDeleteForm($recurso);

        return $this->render('recurso/show.html.twig', array(
            'recurso' => $recurso,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing recurso entity.
     *
     */
    public function editAction(Request $request, recurso $recurso)
    {
        $deleteForm = $this->createDeleteForm($recurso);
        $editForm = $this->createForm('SquirrelBundle\Form\recursoType', $recurso);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('recurso_edit', array('id' => $recurso->getId()));
        }

        return $this->render('recurso/edit.html.twig', array(
            'recurso' => $recurso,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a recurso entity.
     *
     */
    public function deleteAction(Request $request, recurso $recurso)
    {
        $form = $this->createDeleteForm($recurso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($recurso);
            $em->flush();
        }

        return $this->redirectToRoute('recurso_index');
    }

    /**
     * Creates a form to delete a recurso entity.
     *
     * @param recurso $recurso The recurso entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(recurso $recurso)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('recurso_delete', array('id' => $recurso->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
