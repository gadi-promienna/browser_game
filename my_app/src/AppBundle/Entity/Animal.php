<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use UserBundle\Entity\User;

/**
 * Animal
 * @ORM\Table(name="animal")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnimalRepository")
 */
class Animal
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;


    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=7)
     */
    private $color;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var integer
     *
     * @ORM\Column(name="width", type="integer")
     */
    private $width;

    /**
     * @var int
     *
     * @ORM\Column(name="height", type="integer")
     */
    private $height;

    /**
     * @var int
     *
     * @ORM\Column(name="strength", type="integer")
     */
    private $strength;

    /**
     * @var int
     *
     * @ORM\Column(name="intelligence", type="integer")
     */
    private $intelligence;

    /**
     * @var int
     *
     * @ORM\Column(name="hapiness", type="integer")
     */
    private $hapiness;

    /**
     * @var int
     *
     * @ORM\Column(name="sleepiness", type="integer")
     */
    private $sleepiness;


    /**
     * @var int
     *
     * @ORM\Column(name="energy", type="integer")
     */
    private $energy;

    /**
     * @var src\UserBundle\Entity\User as $user
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="animals")
     * JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $owner;

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
     * Set owner
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $animals
     * @return Animal
     */
    public function setOwner($owner)
    {
        $this->owner= $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \Doctrine\Common\Collections\ArrayCollection $animals
     */

    public function getOwner()
    {
        return $this->owner;
    }

     /**
     * Set password
     *
     * @param string $password
     * @return Animal
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Animal
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Animal
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set age
     *
     * @param integer $age
     * @return Animal
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set width
     *
     * @param integer $width
     * @return Animal
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return integer 
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param integer $height
     * @return Animal
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set strength
     *
     * @param integer $strength
     * @return Animal
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * Get strength
     *
     * @return integer 
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Set intelligence
     *
     * @param integer $intelligence
     * @return Animal
     */
    public function setIntelligence($intelligence)
    {
        $this->intelligence = $intelligence;

        return $this;
    }

    /**
     * Get intelligence
     *
     * @return integer 
     */
    public function getIntelligence()
    {
        return $this->intelligence;
    }

    /**
     * Set hapiness
     *
     * @param integer $hapiness
     * @return Animal
     */
    public function setHapiness($hapiness)
    {
        $this->hapiness = $hapiness;

        return $this;
    }

    /**
     * Get hapiness
     *
     * @return integer 
     */
    public function getHapiness()
    {
        return $this->hapiness;
    }

    /**
     * Set sleepiness
     *
     * @param integer $sleepiness
     * @return Animal
     */
    public function setSleepiness($sleepiness)
    {
        $this->sleepiness = $sleepiness;

        return $this;
    }

    /**
     * Get sleepiness
     *
     * @return integer 
     */
    public function getSleepiness()
    {
        return $this->sleepiness;
    }

 
   /**
     * Set energy
     *
     * @param integer $energy
     * @return Animal
     */
    public function setEnergy($energy)
    {
        $this->energy = $energy;

        return $this;
    }

    /**
     * Get energy
     *
     * @return integer 
     */
    public function getEnergy()
    {
        return $this->energy;
    }

 }
