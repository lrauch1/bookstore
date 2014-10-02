<?php

namespace Bookstore\BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Bookstore\BookBundle\Entity\Book as Book;

/**
 * @ORM\Entity
 * @ORM\Table(name="book")
 */
class Book {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string",	length=100)
     */
    protected $title;

    /**
     * @ORM\Column(type="string")
     */
    protected $author;

    /**
     * @ORM\Column(type="string", length=13)
     */
    protected $isbn;

    /**
     * @ORM\Column(type="string")
     */
    protected $course;

    /**
     * @ORM\Column(type="string")
     */
    protected $instructor;

    /**
     * @ORM\Column(type="decimal")
     */
    protected $price;

    /**
     * @ORM\Column(type="integer")
     */
    protected $rating;

    /**
     * @ORM\Column(type="string")
     */
    protected $desclong;

    /**
     * @ORM\Column(type="string")
     */
    protected $descshort;

    /**
     * @ORM\Column(type="integer")
     */
    protected $qty;

    /**
     * @ORM\Column(type="string")
     */
    protected $img;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Book
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Book
     */
    public function setAuthor($author) {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor() {
        return $this->author;
    }

    /**
     * Set isbn
     *
     * @param  $isbn
     * @return Book
     */
    public function setIsbn($isbn) {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Get isbn
     *
     * @return \varchar 
     */
    public function getIsbn() {
        return $this->isbn;
    }

    /**
     * Set course
     *
     * @param string $course
     * @return Book
     */
    public function setCourse($course) {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return string 
     */
    public function getCourse() {
        return $this->course;
    }

    /**
     * Set instructor
     *
     * @param string $instructor
     * @return Book
     */
    public function setInstructor($instructor) {
        $this->instructor = $instructor;

        return $this;
    }

    /**
     * Get instructor
     *
     * @return string 
     */
    public function getInstructor() {
        return $this->instructor;
    }

    /**
     * Get price
     *
     * @return \decimal(19,4) 
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * Set rating
     *
     * @param integer $rating
     * @return Book
     */
    public function setRating($rating) {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return integer 
     */
    public function getRating() {
        return $this->rating;
    }

    /**
     * Set desclong
     *
     * @param string $desclong
     * @return Book
     */
    public function setDesclong($desclong) {
        $this->desclong = $desclong;

        return $this;
    }

    /**
     * Get desclong
     *
     * @return string 
     */
    public function getDesclong() {
        return $this->desclong;
    }

    /**
     * Set descshort
     *
     * @param string $descshort
     * @return Book
     */
    public function setDescshort($descshort) {
        $this->descshort = $descshort;

        return $this;
    }

    /**
     * Get descshort
     *
     * @return string 
     */
    public function getDescshort() {
        return $this->descshort;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Book
     */
    public function setPrice($price) {
        $this->price = $price;

        return $this;
    }

    /**
     * Set qty
     *
     * @param  $qty
     * @return Book
     */
    public function setQty($qty) {
        $this->qty = $qty;

        return $this;
    }

    /**
     * Get qty
     *
     * @return \int 
     */
    public function getQty() {
        return $this->qty;
    }




/**
 * Get img
 *
 * @return \varchar(100) 
 */
public function getImg() {
    return $this->img;
}


    /**
     * Set img
     *
     * @param string $img
     * @return Book
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }
}
