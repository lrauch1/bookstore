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
     $books = $this->getDoctrine()
                ->getRepository('BookstoreBundle:Book')
                ->findAll();
        return $this->render('BookstoreBundle:Book:display.html.php', array('books' => $books));
    //return $this->render('BookstoreBundle:Book:browse.php');
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
