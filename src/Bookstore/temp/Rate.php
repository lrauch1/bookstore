<?php

namespace Bookstore\BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//use Bookstore\BookBundle\Entity\Cart as Cart;

/**
 * @ORM\Entity
 * @ORM\Table(name="rate")
 */
class Rate {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;
    /**
     * @ORM\ManyToOne(targetEntity="Book")
     * @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     */
    protected $book;

     /**
     * @ORM\Column(type="integer")
     */
    protected $rating;
    
    protected $comment;
}