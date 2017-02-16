<?php

namespace FulgurationBundle\Controller;

use FulgurationBundle\Entity\Diplome;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Diplome controller.
 *
 */
class DiplomeController extends Controller
{
    /**
     * Lists all diplome entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $diplomes = $em->getRepository('FulgurationBundle:Diplome')->findBy(array(), array('date' => 'DESC'));
        return $this->render('@Fulguration/diplome/index.html.twig', array(
            'diplomes' => $diplomes,
        ));
    }

    /**
     * Creates a new diplome entity.
     *
     */
    public function newAction(Request $request)
    {
        $diplome = new Diplome();
        $form = $this->createForm('FulgurationBundle\Form\DiplomeType', $diplome);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($diplome);
            $em->flush($diplome);

            return $this->redirectToRoute('diplome_show', array('id' => $diplome->getId()));
        }

        return $this->render('@Fulguration/diplome/new.html.twig', array(
            'diplome' => $diplome,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing diplome entity.
     *
     */
    public function editAction(Request $request, Diplome $diplome)
    {
        $editForm = $this->createForm('FulgurationBundle\Form\DiplomeType', $diplome);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('diplome_edit', array('id' => $diplome->getId()));
        }

        return $this->render('@Fulguration/diplome/edit.html.twig', array(
            'diplome' => $diplome,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a diplome entity.
     *
     */
    public function deleteAction($id)
    {
        if ($id) {
            $em = $this->getDoctrine()->getManager();
            $diplome = $em->getRepository('FulgurationBundle:Diplome')->findOneById($id);
            $em->remove($diplome);
            $em->flush();

            return $this->redirectToRoute('diplome_index');
        } else
            return $this->redirectToRoute('diplome_edit');
    }
}
