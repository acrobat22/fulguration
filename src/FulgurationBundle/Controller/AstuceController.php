<?php

namespace FulgurationBundle\Controller;

use FulgurationBundle\Entity\Astuce;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Astuce controller.
 *
 */
class AstuceController extends Controller
{
    /**
     * Lists all astuce entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $astuces = $em->getRepository('FulgurationBundle:Astuce')->findAll();

        return $this->render('@Fulguration/astuce/index.html.twig', array(
            'astuces' => $astuces,
        ));
    }


    /**
     * Finds and displays a astuce entity.
     *
     */
    public function showAction(Astuce $astuce)
    {
        $deleteForm = $this->createDeleteForm($astuce);

        return $this->render('@Fulguration/astuce/show.html.twig', array(
            'astuce' => $astuce,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing astuce entity.
     *
     */
    public function editAction(Request $request, Astuce $astuce)
    {
        $deleteForm = $this->createDeleteForm($astuce);
        $editForm = $this->createForm('FulgurationBundle\Form\AstuceType', $astuce);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('astuce_edit', array('id' => $astuce->getId()));
        }

        return $this->render('@Fulguration/astuce/edit.html.twig', array(
            'astuce' => $astuce,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a astuce entity.
     *
     */
    public function deleteAction(Request $request, Astuce $astuce)
    {
        $form = $this->createDeleteForm($astuce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($astuce);
            $em->flush($astuce);
        }

        return $this->redirectToRoute('astuce_index');
    }

    /**
     * Creates a form to delete a astuce entity.
     *
     * @param Astuce $astuce The astuce entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Astuce $astuce)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('astuce_delete', array('id' => $astuce->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
