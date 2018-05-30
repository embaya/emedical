<?php

namespace Ben\DoctorsBundle\Controller;

use Ben\DoctorsBundle\Entity\AbstractActe;
use Ben\DoctorsBundle\Form\ATMPType;
use Ben\DoctorsBundle\Form\MaladieType;
use Ben\DoctorsBundle\Form\MaterniteType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ben\DoctorsBundle\Entity\Fse;
use Ben\DoctorsBundle\Form\FseType;
use Ben\DoctorsBundle\Form\ActeNGAPType;
use Ben\DoctorsBundle\Form\ActeCCAMType;
use JMS\SecurityExtraBundle\Annotation\Secure;

/**
 * Fse controller.
 *
 */
class FseController extends Controller
{

    /**
     * Lists all Fse entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entitiesLength = $em->getRepository('BenDoctorsBundle:Fse')->counter();

        return $this->render('BenDoctorsBundle:Fse:index.html.twig', array(
            'entitiesLength' => $entitiesLength));
    }

    /**
     * Fse list using ajax
     * @Secure(roles="ROLE_MANAGER")
     */
    public function ajaxListAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $searchParam = $request->get('searchParam');
        $entities = $em->getRepository('BenDoctorsBundle:Fse')->search($searchParam);
        $pagination = (new Paginator())->setItems(count($entities), $searchParam['perPage'])->setPage($searchParam['page'])->toArray();
        return $this->render('BenDoctorsBundle:Fse:ajax_list.html.twig', array(
            'entities' => $entities,
            'pagination' => $pagination,
        ));
    }

    /**
     * Creates a new Fse entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Fse();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ben_fse_show', array('id' => $entity->getId())));
        }

        return $this->render('BenDoctorsBundle:Fse:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Fse entity.
     *
     * @param Fse $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Fse $entity)
    {
        $form = $this->createForm(new FseType(), $entity, array(
            'action' => $this->generateUrl('ben_fse_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Fse entity.
     *
     */
    public function newAction()
    {
        $entity = new Fse();
        $form = $this->createCreateForm($entity);
        return $this->render('BenDoctorsBundle:Fse:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Fse entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenDoctorsBundle:Fse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fse entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenDoctorsBundle:Fse:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Fse entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenDoctorsBundle:Fse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fse entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BenDoctorsBundle:Fse:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Fse entity.
     *
     * @param Fse $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Fse $entity)
    {
        $form = $this->createForm(new FseType(), $entity, array(
            'action' => $this->generateUrl('ben_fse_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Fse entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BenDoctorsBundle:Fse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fse entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ben_fse_edit', array('id' => $id)));
        }

        return $this->render('BenDoctorsBundle:Fse:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Fse entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BenDoctorsBundle:Fse')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Fse entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('fse'));
    }

    /**
     * Creates a form to delete a Fse entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ben_fse_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }


    function getFormAction(Request $request)
    {
        $types = [
            'actengap' => new ActeNGAPType(),
            'acteccam' => new ActeCCAMType(),
            'maternite' => new MaterniteType(),
            'maladie' => new MaladieType(),
            'atmp' => new ATMPType(),
        ];

        $formName = $request->request->get('form_get_type');
//        $formName= AbstractActe::getTypeName($formName);
       // $formType= $formName.'Type';
       // dump($types[$formName]);
        $form = $this->createForm($types[$formName]);
        return $this->render('BenDoctorsBundle:Fse:generic_form.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
