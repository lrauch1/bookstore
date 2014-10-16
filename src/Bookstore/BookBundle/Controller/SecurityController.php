<?php

namespace Bookstore\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class SecurityController extends Controller
{
    /**
     * used to enforce user logins
     * 
     * throws accessdeniedexception if user is not logged in
     * forcing them to login if not already
     * if they are, then present 403 if they dont have the needed role
     * 
     * @param String $role
     * @throws AccessDeniedException
     */
    public function enforceUserSecurity($role = "ROLE_USER")
    {
        $securityContext = $this->container->get('security.context');
        if (!$securityContext->isGranted($role)) {
            throw new AccessDeniedException("Need $role!");
        }
    }
    public function loginAction(Request $request)
    {
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render(
            'BookstoreBundle:Security:login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error'         => $error,
            )
        );
    }
    public function accountAction() {
        $this->enforceUserSecurity();
        $securityContext = $this->container->get('security.context');
        $user=$securityContext->getToken()->getUser();
        return $this->render(
            'BookstoreBundle:Security:account.html.twig',
            array(
                'id'       => $user->getId(),
                'username' => $user->getUsername(),
                'email'    => $user->getEmail()
            )
        );
    }
    public function account_changeAction($id) {
        $this->enforceUserSecurity();
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('BookstoreBundle:User')->find($id);
        if(!$user){
            throw $this->createNotFoundException("Can't update details: No user found with id ".$id);
        }
        $newpass = ($_POST['_newpass']);
        if($_POST['_username'] != $user->getUsername())$user->setUsername($_POST['_username']);
        if($_POST['_email'] != $user->getEmail())$user->setEmail($_POST['_email']);
        if($_POST['_newpass'] != "") {
            if($_POST['_newpass']==$_POST['_confpass']){
                $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
                $user->setPassword($encoder->encodePassword($newpass, $user->getSalt()));
            } else {
                throw new AccessDeniedException("Passwords do not match!");
            }
        }
        $em->flush();
        return $this->redirect($this->generateUrl('account',array('id'=>$id)));
    }
    
    public function registerAction(){
                $form = $this->createFormBuilder($user)
                ->add('firstName', 'text')
                ->add('lastName', 'text')
                ->add('dob', 'datetime')
                ->add('gpa', 'integer')
                ->add('save', 'submit')
                ->getForm();
    }
}