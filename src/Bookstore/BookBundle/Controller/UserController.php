<?php

namespace Bookstore\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//use Bookstore\BookBundle\Entity\Books;

class UserController extends Controller
{
    
public function createAction(){
    return $this->render('BookstoreBundle:User:create.html.twig');
    }

public function editAction(){
    return $this->render('BookstoreBundle:User:edit.html.twig');
}

public function loginAction(){
    return $this->render('BookstoreBundle:User:login.html.twig');
}

public function logoutAction(){
    return $this->render('BookstoreBundle:User:login.html.twig');
}
}
