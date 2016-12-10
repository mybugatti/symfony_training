<?php

namespace HrBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use HrBundle\Entity\Cover;
use HrBundle\Form\CoverType;

/**
 * Cover controller.
 *
 * @Route("/user")
 */
class CoverController extends Controller
{
    /**
     * Lists all Cover entities.
     *
     * @Route("/", name="user_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $covers = $em->getRepository('HrBundle:Cover')->findAll();

        return $this->render('cover/index.html.twig', array(
            'covers' => $covers,
        ));
    }

    /**
     * Creates a new Cover entity.
     *
     * @Route("/new", name="user_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cover = new Cover();
        $form = $this->createForm('HrBundle\Form\CoverType', $cover);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cover);
            $em->flush();

            return $this->redirectToRoute('user_show', array('id' => $cover->getId()));
        }

        return $this->render('cover/new.html.twig', array(
            'cover' => $cover,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Cover entity.
     *
     * @Route("/{id}", name="user_show")
     * @Method("GET")
     */
    public function showAction(Cover $cover)
    {
        $deleteForm = $this->createDeleteForm($cover);

        return $this->render('cover/show.html.twig', array(
            'cover' => $cover,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Cover entity.
     *
     * @Route("/{id}/edit", name="user_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cover $cover)
    {
        $deleteForm = $this->createDeleteForm($cover);
        $editForm = $this->createForm('HrBundle\Form\CoverType', $cover);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cover);
            $em->flush();

            return $this->redirectToRoute('user_edit', array('id' => $cover->getId()));
        }

        return $this->render('cover/edit.html.twig', array(
            'cover' => $cover,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Cover entity.
     *
     * @Route("/{id}", name="user_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cover $cover)
    {
        $form = $this->createDeleteForm($cover);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cover);
            $em->flush();
        }

        return $this->redirectToRoute('user_index');
    }

    /**
     * Creates a form to delete a Cover entity.
     *
     * @param Cover $cover The Cover entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cover $cover)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $cover->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
