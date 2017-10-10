<?php

namespace SquirrelBundle\Controller;

use SquirrelBundle\Entity\permiso;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Permiso controller.
 *
 */
class permisoController extends Controller
{
    /**
     * Lists all permiso entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $permisos = $em->getRepository('SquirrelBundle:permiso')->findAll();

        return $this->render('permiso/index.html.twig', array(
            'permisos' => $permisos,
        ));
    }

    /**
     * Creates a new permiso entity.
     *
     */
    public function newAction(Request $request)
    {
        $permiso = new Permiso();
        $form = $this->createForm('SquirrelBundle\Form\permisoType', $permiso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($permiso);
            $em->flush();

            return $this->redirectToRoute('permiso_show', array('id' => $permiso->getId()));
        }

        return $this->render('permiso/new.html.twig', array(
            'permiso' => $permiso,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a permiso entity.
     *
     */
    public function showAction(permiso $permiso)
    {
        $deleteForm = $this->createDeleteForm($permiso);

        return $this->render('permiso/show.html.twig', array(
            'permiso' => $permiso,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing permiso entity.
     *
     */
    public function editAction(Request $request, permiso $permiso)
    {
        $deleteForm = $this->createDeleteForm($permiso);
        $editForm = $this->createForm('SquirrelBundle\Form\permisoType', $permiso);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('permiso_edit', array('id' => $permiso->getId()));
        }

        return $this->render('permiso/edit.html.twig', array(
            'permiso' => $permiso,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a permiso entity.
     *
     */
    public function deleteAction(Request $request, permiso $permiso)
    {
        $form = $this->createDeleteForm($permiso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($permiso);
            $em->flush();
        }

        return $this->redirectToRoute('permiso_index');
    }

    /**
     * Creates a form to delete a permiso entity.
     *
     * @param permiso $permiso The permiso entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(permiso $permiso)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('permiso_delete', array('id' => $permiso->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
