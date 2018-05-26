<?php
namespace Ben\UserBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Controller\ProfileController as BaseController;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends BaseController
{
    public function editAction(Request $request)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $formfactory = $this->container->get('fos_user.profile.form.factory');

        $passwordformfactory = $this->get('fos_user.profile.form.factory');

        $passwordform = $passwordformfactory->createForm();
        $form = $formfactory->createForm();
        $form->setData($user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('fos_user_success', 'profile.flash.updated');
            return new RedirectResponse($this->container->get('router')->generate('ben_dashboard'));
        }
        
        // newsletter
        // $em = $this->container->get('doctrine')->getManager();
        // $newsletter = $em->getRepository('BenBlogBundle:newsletter')->findOneByEmail($user->getEmail());

        return $this->render('BenUserBundle:Profile:edit.html.twig', array(
            'form' => $form->createView(),
            'passwordform' => $passwordform->createView(),
           // 'newsletter' => $newsletter,
        ));
    }
}
