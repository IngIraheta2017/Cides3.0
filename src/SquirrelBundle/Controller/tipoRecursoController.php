<?php

namespace SquirrelBundle\Controller;

use SquirrelBundle\Entity\tipoRecurso;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Tiporecurso controller.
 *
 */
class tipoRecursoController extends Controller
{
    /**
     * Lists all tipoRecurso entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tipoRecursos = $em->getRepository('SquirrelBundle:tipoRecurso')->findAll();

        return $this->render('tiporecurso/index.html.twig', array(
            'tipoRecursos' => $tipoRecursos,
        ));
    }

    /**
     * Creates a new tipoRecurso entity.
     *
     */
    public function newAction(Request $request)
    {
        $tipoRecurso = new Tiporecurso();
        $form = $this->createForm('SquirrelBundle\Form\tipoRecursoType', $tipoRecurso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoRecurso);
            $em->flush();

            return $this->redirectToRoute('tiporecurso_show', array('id' => $tipoRecurso->getId()));
        }

        return $this->render('tiporecurso/new.html.twig', array(
            'tipoRecurso' => $tipoRecurso,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tipoRecurso entity.
     *
     */
    public function showAction(tipoRecurso $tipoRecurso)
    {
        $deleteForm = $this->createDeleteForm($tipoRecurso);

        return $this->render('tiporecurso/show.html.twig', array(
            'tipoRecurso' => $tipoRecurso,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tipoRecurso entity.
     *
     */
    public function editAction(Request $request, tipoRecurso $tipoRecurso)
    {
        $deleteForm = $this->createDeleteForm($tipoRecurso);
        $editForm = $this->createForm('SquirrelBundle\Form\tipoRecursoType', $tipoRecurso);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tiporecurso_edit', array('id' => $tipoRecurso->getId()));
        }

        return $this->render('tiporecurso/edit.html.twig', array(
            'tipoRecurso' => $tipoRecurso,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tipoRecurso entity.
     *
     */
    public function deleteAction(Request $request, tipoRecurso $tipoRecurso)
    {
        $form = $this->createDeleteForm($tipoRecurso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tipoRecurso);
            $em->flush();
        }

        return $this->redirectToRoute('tiporecurso_index');
    }

    /**
     * Creates a form to delete a tipoRecurso entity.
     *
     * @param tipoRecurso $tipoRecurso The tipoRecurso entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(tipoRecurso $tipoRecurso)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tiporecurso_delete', array('id' => $tipoRecurso->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
