<?php

namespace Bookstore\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Bookstore\BookBundle\Entity\Cart;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;


class CartController extends Controller {

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
    /**
     * action to view cart
     * 
     * @return string HTML page
     */
    
    public function viewAction() {
        $this->enforceUserSecurity();
        $uid=$this->container->get('security.context')->getToken()->getUser()->getId();
        $repository=$this->getDoctrine()->getRepository('BookstoreBundle:Cart');
        $cart=$repository->findByUid($uid);
        return $this->render('BookstoreBundle:Cart:view.html.php',array(
            'cart'=>$cart
        ));
    }
     /* add a book to the cart
     * 
     * @param type $bid id of book to add
     * @return string
     */
    public function addAction($bid) {
        $this->enforceUserSecurity();
        $uid=$this->container->get('security.context')->getToken()->getUser()->getId();
        $bookrepo=$this->getDoctrine()->getRepository('BookstoreBundle:Book');
        $book=$bookrepo->findByBid($bid);
        $em = $this->getDoctrine()->getManager();
        $cartbook = $em->find("BookstoreBundle:Cart", array("uid"=>$uid,"book"=>$book[0]));
        $bookexists = $cartbook == NULL? false: true;
        if($bookexists){
            $cartbook->setQty($cartbook->getQty()+1);
        }else{
            $cart= new Cart();
            $cart->setUid($uid);
            $cart->setBook($book[0]);
            $cart->setQty(1);
            $em->persist($cart);
        }
        $em->flush();
        return $this->redirect($this->generateUrl('view_cart',array(
            'id'=>$bid
        )));
    }
      /**
     * Update qty of items in cart
     * 
     * @return string
     * returns viewAction
     */
     public function updateAction() {
        $em = $this->getDoctrine()->getManager();
        $bid=$_POST['bid'];
        $uid=$_POST['uid'];
        $bookrepo=$this->getDoctrine()->getRepository('BookstoreBundle:Book');
        $book=$bookrepo->findByBid($bid);
        $cartbook = $em->find("BookstoreBundle:Cart", array("uid"=>$uid,"book"=>$book[0]));
        if($_POST['qty']==0){
            $em->remove($cartbook);
        }else{
            $cartbook->setQty($_POST['qty']);
        }
        $em->flush();
        return $this->redirect($this->generateUrl('view_cart',array(
            'status'=>true
        )));
    }
       /**
     * shows invoice and empties cart
     * 
     * @return string html page
     */
    public function purchaseAction() {
        $this->enforceUserSecurity();
        $em = $this->getDoctrine()->getManager();
        $uid=$this->container->get('security.context')->getToken()->getUser()->getId();
        $repository=$this->getDoctrine()->getRepository('BookstoreBundle:Cart');
        $cart=$repository->findByUid($uid);
        foreach($cart as $cartentry){
            $cartentry->getBook()->setQty($cartentry->getBook()->getQty()-$cartentry->getQty());
            $em->remove($cartentry);
        }
        $em->flush();
        return $this->render('BookstoreBundle:Cart:purchase.html.php',array(
            'cart'=>$cart
        ));
    }

}
