<?php

namespace SquirrelBundle\Controller;

use SquirrelBundle\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Usuario controller.
 *
 */
class UsuarioController extends Controller
{
    /**
     * Lists all usuario entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $usuarios = $em->getRepository('SquirrelBundle:Usuario')->findAll();

        return $this->render('usuario/index.html.twig', array(
            'usuarios' => $usuarios,
        ));
    }

    /**
     * Creates a new usuario entity.
     *
     */
    public function newAction(Request $request)
    {
        $usuario = new Usuario();
        $form = $this->createForm('SquirrelBundle\Form\UsuarioType', $usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          $password = $form->get('password')->getData();
         $encoder = $this->container->get('security.password_encoder');
         $encoded = $encoder->encodePassword($usuario, $password);
         $usuario->setPassword($encoded);
         $em = $this->getDoctrine()->getManager();
        $em->persist($usuario);
        $em->flush();

            return $this->redirectToRoute('usuario_show', array('id' => $usuario->getId()));
        }

        return $this->render('usuario/new.html.twig', array(
            'usuario' => $usuario,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a usuario entity.
     *
     */
    public function showAction(Usuario $usuario)
    {
        $deleteForm = $this->createDeleteForm($usuario);

        return $this->render('usuario/show.html.twig', array(
            'usuario' => $usuario,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing usuario entity.
     *
     */
    public function editAction(Request $request, Usuario $usuario)
    {
        $deleteForm = $this->createDeleteForm($usuario);
        $editForm = $this->createForm('SquirrelBundle\Form\UsuarioType', $usuario);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('usuario_edit', array('id' => $usuario->getId()));
        }

        return $this->render('usuario/edit.html.twig', array(
            'usuario' => $usuario,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a usuario entity.
     *
     */
    public function deleteAction(Request $request, Usuario $usuario)
    {
        $form = $this->createDeleteForm($usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($usuario);
            $em->flush();
        }

        return $this->redirectToRoute('usuario_index');
    }

    /**
     * Creates a form to delete a usuario entity.
     *
     * @param Usuario $usuario The usuario entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Usuario $usuario)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('usuario_delete', array('id' => $usuario->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
