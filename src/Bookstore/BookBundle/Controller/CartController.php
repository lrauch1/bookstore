<?php

namespace Bookstore\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//use Bookstore\BookBundle\Entity\Books;

class CartController extends Controller
{
    
public function addAction(){
    return $this->render('BookstoreBundle:Cart:add.html.twig');
    }

public function deleteAction(){
    return $this->render('BookstoreBundle:Cart:delete.html.twig');
}

public function viewAction(){
    return $this->render('BookstoreBundle:Cart:view.html.twig');
}

public function buyAction(){
    return $this->render('BookstoreBundle:Cart:buy.html.twig');
}
}
