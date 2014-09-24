<?php

namespace Bookstore\BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Bookstore\BookBundle\Entity\Cart as Cart;

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
     * @ORM\Column(type="integer")
     */
    protected $uid;
    /**
     * @ORM\Column(type="integer")
     */
    protected $bid;

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
     * Set bid
     *
     * @param integer $bid
     * @return Cart
     */
    public function setBid($bid)
    {
        $this->bid = $bid;

        return $this;
    }

    /**
     * Get bid
     *
     * @return integer 
     */
    public function getBid()
    {
        return $this->bid;
    }
}
