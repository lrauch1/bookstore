<?php

namespace Bookstore\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//use Bookstore\BookBundle\Entity\Books;

class BookController extends Controller
{
    public function indexAction()
    {
        return $this->browseAction();
    }
    
public function browseAction(){
    return $this->render('BookstoreBundle:Book:browse.html.twig');
    }

public function searchAction(){
    return $this->render('BookstoreBundle:Book:search.html.twig');
}

public function detailsAction(){
    return $this->render('BookstoreBundle:Book:details.html.twig');
}

public function rateAction(){
    return $this->render('BookstoreBundle:Book:rate.html.twig');
}
}
