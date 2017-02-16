<?php

namespace FulgurationBundle\Controller;

use FulgurationBundle\Entity\Realisation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Realisation controller.
 *
 */
class RealisationController extends Controller
{
    /**
     * Lists all realisation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $realisations = $em->getRepository('FulgurationBundle:Realisation')->findAll();

        return $this->render('@Fulguration/realisation/index.html.twig', array(
            'realisations' => $realisations,
        ));
    }

    /**
     * Creates a new realisation entity.
     *
     */
    public function newAction(Request $request)
    {
        $realisation = new Realisation();
        $form = $this->createForm('FulgurationBundle\Form\RealisationType', $realisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($realisation);
            $em->flush($realisation);

            return $this->redirectToRoute('realisation_show', array('id' => $realisation->getId()));
        }

        return $this->render('@Fulguration/realisation/new.html.twig', array(
            'realisation' => $realisation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a realisation entity.
     *
     */
    public function showAction(Realisation $realisation)
    {
        $deleteForm = $this->createDeleteForm($realisation);

        return $this->render('@Fulguration/realisation/show.html.twig', array(
            'realisation' => $realisation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing realisation entity.
     *
     */
    public function editAction(Request $request, Realisation $realisation)
    {
        $deleteForm = $this->createDeleteForm($realisation);
        $editForm = $this->createForm('FulgurationBundle\Form\RealisationType', $realisation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('realisation_edit', array('id' => $realisation->getId()));
        }

        return $this->render('@Fulguration/realisation/edit.html.twig', array(
            'realisation' => $realisation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a realisation entity.
     *
     */
    public function deleteAction(Request $request, Realisation $realisation)
    {
        $form = $this->createDeleteForm($realisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($realisation);
            $em->flush($realisation);
        }

        return $this->redirectToRoute('realisation_index');
    }

    /**
     * Creates a form to delete a realisation entity.
     *
     * @param Realisation $realisation The realisation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Realisation $realisation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('realisation_delete', array('id' => $realisation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
