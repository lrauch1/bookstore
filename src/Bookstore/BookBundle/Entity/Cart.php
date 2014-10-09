<?php

namespace Bookstore\BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Bookstore\BookBundle\Entity\Book;
use Bookstore\BookBundle\Entity\User;
//use Bookstore\BookBundle\Entity\Cart as Cart;

/**
 * @ORM\Entity
 * @ORM\Table(name="cart")
 */
class Cart {
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param \Bookstore\BookBundle\Entity\User $user
     * @return Cart
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Bookstore\BookBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set book
     *
     * @param \Bookstore\BookBundle\Entity\Book $book
     * @return Cart
     */
    public function setBook(Book $book = null)
    {
        $this->book = $book;

        return $this;
    }

    /**
     * Get book
     *
     * @return \Bookstore\BookBundle\Entity\Book 
     */
    public function getBook()
    {
        return $this->book;
    }
}
