<?php

namespace Ben\DoctorsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ben\DoctorsBundle\Entity\Speciality;
use Ben\DoctorsBundle\Form\SpecialityType;

/**
 * Speciality controller.
 *
 * @Route("/speciality")
 */
class SpecialityController extends Controller
{

    /**
     * Lists all Speciality entities.
     *
     * @Route("/", name="speciality")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BenDoctorsBundle:Speciality')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Speciality entity.
     *
     * @Route("/", name="speciality_create")
     * @Method("POST")
     * @Template("BenDoctorsBundle:Speciality:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Speciality();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('speciality_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Speciality entity.
     *
     * @param Speciality $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Speciality $entity)
    {
        $form = $this->createForm(new SpecialityType(), $entity, array(
            'action' => $this->generateUrl('speciality_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Speciality entity.
     *
     * @Route("/new", name="speciality_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Speciality();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Speciality entity.
     *
     * @Route("/{id}", name="speciality_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenDoctorsBundle:Speciality')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Speciality entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Speciality entity.
     *
     * @Route("/{id}/edit", name="speciality_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenDoctorsBundle:Speciality')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Speciality entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Speciality entity.
    *
    * @param Speciality $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Speciality $entity)
    {
        $form = $this->createForm(new SpecialityType(), $entity, array(
            'action' => $this->generateUrl('speciality_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Speciality entity.
     *
     * @Route("/{id}", name="speciality_update")
     * @Method("PUT")
     * @Template("BenDoctorsBundle:Speciality:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenDoctorsBundle:Speciality')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Speciality entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('speciality_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Speciality entity.
     *
     * @Route("/{id}", name="speciality_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BenDoctorsBundle:Speciality')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Speciality entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('speciality'));
    }

    /**
     * Creates a form to delete a Speciality entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('speciality_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
