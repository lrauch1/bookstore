<?php

namespace Bookstore\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Bookstore\BookBundle\Entity\User;

class SecurityController extends Controller {

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
    public function enforceUserSecurity($role = "ROLE_USER") {
        $securityContext = $this->container->get('security.context');
        if (!$securityContext->isGranted($role)) {
            throw new AccessDeniedException("Need $role!");
        }
    }

    public function loginAction(Request $request) {
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
                        'BookstoreBundle:Security:login.html.twig', array(
                    // last username entered by the user
                    'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                    'error' => $error,
                        )
        );
    }

    public function accountAction() {
        $this->enforceUserSecurity();
        $securityContext = $this->container->get('security.context');
        $user = $securityContext->getToken()->getUser();
        return $this->render(
                        'BookstoreBundle:Security:account.html.twig', array(
                    'id' => $user->getId(),
                    'username' => $user->getUsername(),
                    'email' => $user->getEmail()
                        )
        );
    }

    public function account_changeAction($id) {
        $this->enforceUserSecurity();
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('BookstoreBundle:User')->find($id);
        if (!$user) {
            throw $this->createNotFoundException("Can't update details: No user found with id " . $id);
        }
        $newpass = ($_POST['_newpass']);
        if ($_POST['_username'] != $user->getUsername())
            $user->setUsername($_POST['_username']);
        if ($_POST['_email'] != $user->getEmail())
            $user->setEmail($_POST['_email']);
        if ($_POST['_newpass'] != "") {
            if ($_POST['_newpass'] == $_POST['_confpass']) {
                $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
                $user->setPassword($encoder->encodePassword($newpass, $user->getSalt()));
            } else {
                throw new AccessDeniedException("Passwords do not match!");
            }
        }
        $em->flush();
        return $this->redirect($this->generateUrl('account', array('id' => $id)));
    }

    public function registerAction() {
        return $this->render('BookstoreBundle:User:register.html.twig');
    }

    public function addAccountAction() {
        $uname = $_POST['uname'];
        $pword = $_POST['pword'];
        $cpword = $_POST['cpword'];
        $email = $_POST['email'];
        if ($pword != $cpword)
            throw new AccessDeniedException("Passwords do not match!");
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $user->setUsername($uname);
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
        $user->setPassword($encoder->encodePassword($pword, $user->getSalt()));
        $user->setEmail($email);
        $user->setIsActive(true);
        $em->persist($user);
        $em->flush();

        // Manually log in the user
        // "secured_area" refers to the firewall name in security.yml
        $token = new UsernamePasswordToken($user, $user->getPassword(), "secured_area", $user->getRoles());
        $this->get("security.context")->setToken($token);

        // Fire the login event
        // Logging the user in above the way we do it doesn't do this automatically
        $request = Request::createFromGlobals();
        $event = new InteractiveLoginEvent($request, $token);
        $this->get("event_dispatcher")->dispatch("security.interactive_login", $event);

        return $this->redirect($this->generateUrl('display_books'));
    }

}
