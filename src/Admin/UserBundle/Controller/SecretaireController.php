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
 * @Route("/secretaire")
 */
class SecretaireController extends Controller
{
    /**
     * Lists all Delegue entities.
     *
     * @Route("/", name="secretaire")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AdminUserBundle:User')->getSecretaire();

        return $this->render('AdminUserBundle:Secretaire:index.html.twig', array( 'entities' => $entities));
    }

    /**
     * Displays a form to edit an existing Delegue entity.
     *
     * @Route("/", name="secretaire_create")
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
            $entity->addRole('ROLE_SECRETAIRE');
            $entity->setEnabled(true);
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('secretaire'));
        }

        return $this->render('AdminUserBundle:Secretaire:new.html.twig', array(
            'create_form'   => $createForm->createView(),
        ));
    }

    /**
     * Displays a form to create a new Budget entity.
     *
     * @Route("/new", name="secretaire_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $entity = new User();
        $form   = $this->createCreateForm($entity);

        return $this->render('AdminUserBundle:Secretaire:new.html.twig', array(
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
            'action' => $this->generateUrl('secretaire_create'),
            'method' => 'POST',
        ));
        return $form;
    }



    /**
     * Finds and displays a Delegue entity.
     *
     * @Route("/{id}/show", name="secretaire_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdminUserBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Secretaire entity.');
        }

        return $this->render('AdminUserBundle:Secretaire:show.html.twig', array(
            'entity' => $entity,
        ));
    }

    /**
     * Displays a form to edit an existing Delegue entity.
     *
     * @Route("/{id}/update", name="secretaire_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdminUserBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Secretaire entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('AdminUserBundle:Secretaire:edit.html.twig', array(
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
            'action' => $this->generateUrl('secretaire_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        return $form;
    }

    /**
     * Deletes a Delegue entity.
     *
     * @Route("/{id}/delete", name="secretaire_delete")
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AdminUserBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Secretaire entity.');
        }

        $em->remove($entity);
        $em->flush();


        return $this->redirect($this->generateUrl('secretaire'));
    }

    /**
     * Edits an existing Delegue entity.
     *
     * @Route("/{id}/edit", name="secretaire_update")
     */
    public function updateAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdminUserBundle:User')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Secretaire entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('secretaire'));
        }

        return $this->render('AdminUserBundle:Secretaire:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }


}
