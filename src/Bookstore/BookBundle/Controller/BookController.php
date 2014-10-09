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
        $repository=$this->getDoctrine()->getRepository('BookstoreBundle:Book');
        switch ($_POST['type']) {
            case "title":
                $qb=$repository->createQueryBuilder('b');
                $qb->where('b.title LIKE :title')
                        ->orderBy('b.id', 'ASC')
                        ->setParameter('title', $_POST['text']."%");
                $query = $qb->getQuery();
                $result=$query->getResult();
                break;
            case "isbn":
                $qb=$repository->createQueryBuilder('b');
                $qb->where('b.isbn LIKE :isbn')
                        ->orderBy('b.id', 'ASC')
                        ->setParameter('isbn', $_POST['text']."%");
                $query = $qb->getQuery();
                $result=$query->getResult();
                break;
            case "course":
                $qb=$repository->createQueryBuilder('b');
                $qb->where('b.course LIKE :course')
                        ->orderBy('b.id', 'ASC')
                        ->setParameter('course', $_POST['text']."%");
                $query = $qb->getQuery();
                $result=$query->getResult();
                break;
            case "instructor":
                $qb=$repository->createQueryBuilder('b');
                $qb->where('b.instructor LIKE :instructor')
                        ->orderBy('b.id', 'ASC')
                        ->setParameter('instructor', $_POST['text']."%");
                $query = $qb->getQuery();
                $result=$query->getResult();
                break;
            default:
                //we should never get to this point
                //unless someone adds a search term
                //and forgets to add a case for it
                throw new \Exception("Something went wrong while searching for '{$_POST['type']}:{$_POST['text']}'", 500);
                break;
        }
        return $this->render('BookstoreBundle:Book:search.html.php',
                array(
                    'books'=>$result,
                    'searchcat'=>$_POST['type'],
                    'searchterm'=>$_POST['text']
                ));
}

public function detailsAction($id){
    $book = $this->getDoctrine()
            ->getRepository('BookstoreBundle:Book')
            ->find($id);
    //var_dump($book);
    return $this->render('BookstoreBundle:Book:details.html.php', array('book' => $book));
}

public function rateAction(){
    return $this->render('BookstoreBundle:Book:rate.html.twig');
}
}
