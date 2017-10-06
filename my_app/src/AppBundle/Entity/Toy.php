<?php
/**
 * Toy entity
 */


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Toy
 *
 * @ORM\Table(name="toy")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ToyRepository")
 */
class Toy
{
    /**
     * Primary key.
     *
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Name.
     *
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, unique=true)
     */
    private $name;

    /**
     * Image.
     *
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * Heppy change.
     *
     * @var int
     *
     * @ORM\Column(name="hapiness", type="integer")
     */
    private $hapiness;

    /**
     * Intelligence level.
     *
     * @var int
     *
     * @ORM\Column(name="intelligence", type="integer")
     */
    private $intelligence;


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
     * Set name
     *
     * @param  string $name
     * @return Toy
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
     * Set image
     *
     * @param  string $image
     * @return Toy
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set hapiness
     *
     * @param  integer $hapiness
     * @return Toy
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
     * Set intelligence
     *
     * @param  integer $intelligence
     * @return Toy
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
}
