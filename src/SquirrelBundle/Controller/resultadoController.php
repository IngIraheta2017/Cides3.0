<?php

namespace SquirrelBundle\Controller;

use SquirrelBundle\Entity\resultado;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Resultado controller.
 *
 */
class resultadoController extends Controller
{
    /**
     * Lists all resultado entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $resultados = $em->getRepository('SquirrelBundle:resultado')->findAll();

        return $this->render('resultado/index.html.twig', array(
            'resultados' => $resultados,
        ));
    }

    /**
     * Creates a new resultado entity.
     *
     */
    public function newAction(Request $request)
    {
        $resultado = new Resultado();
        $form = $this->createForm('SquirrelBundle\Form\resultadoType', $resultado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($resultado);
            $em->flush();

            return $this->redirectToRoute('resultado_show', array('id' => $resultado->getId()));
        }

        return $this->render('resultado/new.html.twig', array(
            'resultado' => $resultado,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a resultado entity.
     *
     */
    public function showAction(resultado $resultado)
    {
        $deleteForm = $this->createDeleteForm($resultado);

        return $this->render('resultado/show.html.twig', array(
            'resultado' => $resultado,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing resultado entity.
     *
     */
    public function editAction(Request $request, resultado $resultado)
    {
        $deleteForm = $this->createDeleteForm($resultado);
        $editForm = $this->createForm('SquirrelBundle\Form\resultadoType', $resultado);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('resultado_edit', array('id' => $resultado->getId()));
        }

        return $this->render('resultado/edit.html.twig', array(
            'resultado' => $resultado,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a resultado entity.
     *
     */
    public function deleteAction(Request $request, resultado $resultado)
    {
        $form = $this->createDeleteForm($resultado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($resultado);
            $em->flush();
        }

        return $this->redirectToRoute('resultado_index');
    }

    /**
     * Creates a form to delete a resultado entity.
     *
     * @param resultado $resultado The resultado entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(resultado $resultado)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('resultado_delete', array('id' => $resultado->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
