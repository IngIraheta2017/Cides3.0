<?php

namespace SquirrelBundle\Controller;

use SquirrelBundle\Entity\menuItem;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Menuitem controller.
 *
 */
class menuItemController extends Controller
{
    /**
     * Lists all menuItem entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $menuItems = $em->getRepository('SquirrelBundle:menuItem')->findAll();

        return $this->render('menuitem/index.html.twig', array(
            'menuItems' => $menuItems,
        ));
    }

    /**
     * Creates a new menuItem entity.
     *
     */
    public function newAction(Request $request)
    {
        $menuItem = new Menuitem();
        $form = $this->createForm('SquirrelBundle\Form\menuItemType', $menuItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($menuItem);
            $em->flush();

            return $this->redirectToRoute('menuitem_show', array('id' => $menuItem->getId()));
        }

        return $this->render('menuitem/new.html.twig', array(
            'menuItem' => $menuItem,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a menuItem entity.
     *
     */
    public function showAction(menuItem $menuItem)
    {
        $deleteForm = $this->createDeleteForm($menuItem);

        return $this->render('menuitem/show.html.twig', array(
            'menuItem' => $menuItem,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing menuItem entity.
     *
     */
    public function editAction(Request $request, menuItem $menuItem)
    {
        $deleteForm = $this->createDeleteForm($menuItem);
        $editForm = $this->createForm('SquirrelBundle\Form\menuItemType', $menuItem);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('menuitem_edit', array('id' => $menuItem->getId()));
        }

        return $this->render('menuitem/edit.html.twig', array(
            'menuItem' => $menuItem,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a menuItem entity.
     *
     */
    public function deleteAction(Request $request, menuItem $menuItem)
    {
        $form = $this->createDeleteForm($menuItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($menuItem);
            $em->flush();
        }

        return $this->redirectToRoute('menuitem_index');
    }

    /**
     * Creates a form to delete a menuItem entity.
     *
     * @param menuItem $menuItem The menuItem entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(menuItem $menuItem)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('menuitem_delete', array('id' => $menuItem->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
