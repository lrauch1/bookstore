<?php

namespace Bookstore\BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cart
 *
 * @ORM\Table(name="cart")
 * @ORM\Entity
 */
class Cart
{

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="uid", type="integer")
     */
    private $uid;

    /**
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="\Bookstore\BookBundle\Entity\Book")
     * @ORM\JoinColumn(name="book_id", referencedColumnName="bid")
     */
    private $book;
    
    /**
     * @ORM\Column(name="qty", type="integer")
     */
    private $qty;

    /**
     * Set uid
     *
     * @param integer $uid
     * @return Cart
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid
     *
     * @return integer 
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set qty
     *
     * @param integer $qty
     * @return Cart
     */
    public function setQty($qty)
    {
        $this->qty = $qty;

        return $this;
    }

    /**
     * Get qty
     *
     * @return integer 
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * Set book
     *
     * @param \ITAS\BookBundle\Entity\Book $book
     * @return Cart
     */
    public function setBook(\Bookstore\BookBundle\Entity\Book $book)
    {
        $this->book = $book;

        return $this;
    }

    /**
     * Get book
     *
     * @return \ITAS\BookBundle\Entity\Book 
     */
    public function getBook()
    {
        return $this->book;
    }
}
