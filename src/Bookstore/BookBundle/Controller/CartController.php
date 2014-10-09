<?php

namespace Bookstore\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

//use Bookstore\BookBundle\Entity\Books;

class CartController extends Controller {

    public function addAction() {
        $em = $this->getDoctrine()->getManager();
        //get user
        $user = $this->getUser();
        //get book
        $book = $em->getRepository('BookstoreBundle:Book')->find($id);

        if (!book) {
            throw $this->createNotFoundException(
                    "No book found with id " . $id
            );
        }
        //make new cart object and populate
        $cart = new Cart();
        $cart = setUser($user);
        $cart = setBook($book);
        var_dump($cart);
        //save the cart object in DB
        $em->persist($cart);
        $em->flush();

        return $this->render('ITASBookBundle:Book:browse.html.twig', array('name' => "CartController::addAction()"));
    }

    public function deleteAction() {
        return $this->render('BookstoreBundle:Cart:delete.html.twig');
    }

    public function viewAction() {
        return $this->render('BookstoreBundle:Cart:view.html.twig');
    }

    public function buyAction() {
        return $this->render('BookstoreBundle:Cart:buy.html.twig');
    }

}
