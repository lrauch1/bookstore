<?php
namespace Bookstore\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class SecurityController extends Controller
{
    public function loginAction()
    {
        $request = $this->getRequest();
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
        public function dumpStringAction()
    {
      return $this->render('BookstoreBundle:Security:dumpString.html.twig', array());
    }
    
    /*
     * Enforces user login
     * If not logged in
     * and 403 if logged in without passed role
     * @param string Role role to enforce
     * Throws access denied exception
     */
    public function enforceLogin ($role='ROLE_CREATE'){
        $security = $this->container
                         ->get('security.context');
        if(!$security->isGranted($role)){
            Throw new AccessDeniedException("Need $role");
        }
    }
    
    public function someSecureAction(){
        $this->enforceLogin();
        echo "Logged in as user";
    }
    
    public function someAdminAction(){
        $this->enforceLogin('Role_admin');
        echo "Logged in as admin";
    }
}