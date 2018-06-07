<?php

namespace Admin\UserBundle\Controller;

use Admin\UserBundle\Form\UserRegistrationType;
use Admin\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * Delegue controller.
 *
 * @Route("/delegue")
 */
class DelegueController extends Controller
{
    /**
     * Lists all Delegue entities.
     *
     * @Route("/", name="delegue")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AdminUserBundle:User')->getDelegue();

        return $this->render('AdminUserBundle:Delegue:index.html.twig', array( 'entities' => $entities));
    }

    /**
     * Displays a form to edit an existing Delegue entity.
     *
     * @Route("/", name="delegue_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $entity = new User();
        $createForm = $this->createCreateForm($entity);
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->addRole('ROLE_DELEGUE');
            $entity->setEnabled(true);
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('delegue'));
        }

        return $this->render('AdminUserBundle:Delegue:new.html.twig', array(
            'create_form'   => $createForm->createView(),
        ));
    }

    /**
     * Displays a form to create a new Budget entity.
     *
     * @Route("/new", name="delegue_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $entity = new User();
        $form   = $this->createCreateForm($entity);

        return $this->render('AdminUserBundle:Delegue:new.html.twig', array(
            'entity' => $entity,
            'create_form'   => $form->createView(),
        ));
    }


    /**
     * Creates a form to edit a Delegue entity.
     *
     * @param Delegue $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm($entity)
    {
        $form = $this->createForm(new UserRegistrationType(), $entity, array(
            'action' => $this->generateUrl('delegue_create'),
            'method' => 'POST',
        ));
        return $form;
    }



    /**
     * Finds and displays a Delegue entity.
     *
     * @Route("/{id}/show", name="delegue_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdminUserBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Delegue entity.');
        }

        return $this->render('AdminUserBundle:Delegue:show.html.twig', array(
            'entity' => $entity,
        ));
    }

    /**
     * Displays a form to edit an existing Delegue entity.
     *
     * @Route("/{id}/update", name="delegue_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdminUserBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Delegue entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('AdminUserBundle:Delegue:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }



    /**
     * Creates a form to edit a Delegue entity.
     *
     * @param Delegue $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(User $entity)
    {
        $form = $this->createForm(new UserRegistrationType(), $entity, array(
            'action' => $this->generateUrl('delegue_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        return $form;
    }

    /**
     * Deletes a Delegue entity.
     *
     * @Route("/{id}/delete", name="delegue_delete")
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AdminUserBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Delegue entity.');
        }

        $em->remove($entity);
        $em->flush();


        return $this->redirect($this->generateUrl('delegue'));
    }

    /**
     * Edits an existing Delegue entity.
     *
     * @Route("/{id}/edit", name="delegue_update")
     */
    public function updateAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdminUserBundle:User')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Delegue entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('delegue'));
        }

        return $this->render('AdminUserBundle:Delegue:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }


}
