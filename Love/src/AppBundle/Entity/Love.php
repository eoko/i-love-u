<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Table(name="love")
 * @ORM\Entity(repositoryClass="AppBundle\Repositiry\LoveRepository")
 */
class Love
{
  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
   protected $id;

   /**
    * @ORM\Column(type="string", length=15, unique=true)
    */
  protected $ip;

  /**
   * @ORM\Column(type="datetime")
   */
  protected $likedAt;

  public function __construct()
  {
    $this->likedAt = new \DateTime();
  }

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
     * Set likedAt
     *
     * @param \DateTime $likedAt
     *
     * @return Love
     */
    public function setLikedAt($likedAt)
    {
        $this->likedAt = $likedAt;

        return $this;
    }

    /**
     * Get likedAt
     *
     * @return \DateTime
     */
    public function getLikedAt()
    {
        return $this->likedAt;
    }

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return Love
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }
}
