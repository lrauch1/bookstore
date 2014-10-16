<?php

namespace Bookstore\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Bookstore\BookBundle\Entity\Rate;
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
     $ratings=$this->getDoctrine()
                ->getRepository('BookstoreBundle:Rate')
                ->findAll();
        $ratingsToPass=array();
        $numOfRatings=array();
        foreach ($ratings as $rating) {
            if(!isset($ratingsToPass[$rating->getBid()]))$ratingsToPass[$rating->getBid()]=0;
            $ratingsToPass[$rating->getBid()]+=$rating->getRating();
            if(!isset($numOfRatings[$rating->getBid()]))$numOfRatings[$rating->getBid()]=0;
            $numOfRatings[$rating->getBid()]++;
        }
        foreach($ratingsToPass as $bid=>$rating){
            $ratingsToPass[$bid]=$rating/$numOfRatings[$bid]."/5";
        }
        return $this->render('BookstoreBundle:Book:display.html.php', array('books' => $books, 'ratings'=>$ratingsToPass));
    //return $this->render('BookstoreBundle:Book:browse.php');
    }    
    
public function searchAction(){
        $repository=$this->getDoctrine()->getRepository('BookstoreBundle:Book');
        switch ($_POST['type']) {
            case "title":
                $qb=$repository->createQueryBuilder('b');
                $qb->where('b.title LIKE :title')
                        ->orderBy('b.bid', 'ASC')
                        ->setParameter('title', $_POST['text']."%");
                $query = $qb->getQuery();
                $result=$query->getResult();
                break;
            case "isbn":
                $qb=$repository->createQueryBuilder('b');
                $qb->where('b.isbn LIKE :isbn')
                        ->orderBy('b.bid', 'ASC')
                        ->setParameter('isbn', $_POST['text']."%");
                $query = $qb->getQuery();
                $result=$query->getResult();
                break;
            case "course":
                $qb=$repository->createQueryBuilder('b');
                $qb->where('b.course LIKE :course')
                        ->orderBy('b.bid', 'ASC')
                        ->setParameter('course', $_POST['text']."%");
                $query = $qb->getQuery();
                $result=$query->getResult();
                break;
            case "instructor":
                $qb=$repository->createQueryBuilder('b');
                $qb->where('b.instructor LIKE :instructor')
                        ->orderBy('b.bid', 'ASC')
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
         $ratings=$this->getDoctrine()
                ->getRepository('BookstoreBundle:Rate')
                ->findAll();
        $ratingsToPass=array();
        $numOfRatings=array();
        foreach ($ratings as $rating) {
            if(!isset($ratingsToPass[$rating->getBid()]))$ratingsToPass[$rating->getBid()]=0;
            $ratingsToPass[$rating->getBid()]+=$rating->getRating();
            if(!isset($numOfRatings[$rating->getBid()]))$numOfRatings[$rating->getBid()]=0;
            $numOfRatings[$rating->getBid()]++;
        }
        foreach($ratingsToPass as $bid=>$rating){
            $ratingsToPass[$bid]=$rating/$numOfRatings[$bid]."/5";
        return $this->render('BookstoreBundle:Book:search.html.php',
                array(
                    'books'=>$result,
                    'searchcat'=>$_POST['type'],
                    'searchterm'=>$_POST['text']
                ));
}}

public function detailsAction($id){
    $em = $this->getDoctrine()->getManager();
        $book = $em->getRepository('BookstoreBundle:Book')->find($id);
        if(!$book){
            throw $this->createNotFoundException("Can't show details: No book found with id ".$id);
        }
        $dbRatings=$this->getDoctrine()
                ->getRepository('BookstoreBundle:Rate')
                ->findAll();
        $dbUsers=$this->getDoctrine()
                ->getRepository('BookstoreBundle:User')
                ->findAll();
        $users=array();
        foreach($dbUsers as $user){
            $users[$user->getId()]=$user;
        }
        $ratings=array();
        foreach($dbRatings as $rating){
            if($rating->getBid()!=$id)continue;
            $ratings[]=array(
                'user'=>$users[$rating->getUid()]->getUsername(),
                'rating'=>$rating->getRating()."/5",
                'comment'=>$rating->getComment()
            );
        }
        if(count($ratings)==0)$ratings[]=array("user"=>"None","rating"=>"NULL","comment"=>"NULL");
        return $this->render('BookstoreBundle:Book:details.html.php',
                array('book'=>$book,'ratings'=>$ratings));
}

 public function rateAction($id) {
        $em = $this->getDoctrine()->getManager();
        $rating= new Rate();
        $rating->setUid($this->get('security.context')->getToken()->getUser()->getId());
        $rating->setBid($id);
        $rating->setRating($_POST['rating']);
        $rating->setComment($_POST['comment']);
        $em->persist($rating);
        $em->flush();
        return $this->redirect($this->generateUrl('details_books',array(
            'id'=>$id
        )));
    }
}
