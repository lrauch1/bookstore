<?php

namespace Bookstore\BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Bookstore\BookBundle\Entity\Book as Book;
use Bookstore\BookBundle\Entity\User as User;
use Bookstore\BookBundle\Entity\Rate as Rate;

/**
 * Rating
 *
 * @ORM\Table(name="rating")
 * @ORM\Entity
 */
class Rate
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(name="uid", type="integer")
     */
    private $uid;

    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(name="bid", type="integer")
     */
    private $bid;

    /**
     * @var integer
     *
     * @ORM\Column(name="rating", type="integer")
     */
    private $rating;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=255)
     */
    private $comment;


    /**
     * Set uid
     *
     * @param integer $uid
     * @return Rate
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
     * @return Rate
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

    /**
     * Set rating
     *
     * @param integer $rating
     * @return Rate
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return integer 
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Rate
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }
}
