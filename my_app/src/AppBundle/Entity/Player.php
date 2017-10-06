<?php
/**
 * Player entity
 */


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 *
 * @ORM\Table(name="player")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlayerRepository")
 */
class Player
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
     * Login.
     *
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=45, unique=true)
     */
    private $login;

    /**
     * Primary password.
     *
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=45)
     */
    private $password;

    /**
     * Role.
     *
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=10)
     */
    private $role;

    /**
     * Mail.
     *
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=45, unique=true)
     */
    private $mail;

    /**
     * Last login.
     *
     * @var \DateTime
     *
     * @ORM\Column(name="last_login", type="datetime")
     */
    private $lastLogin;

    /**
     * Name.
     *
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, unique=true)
     */
    private $name;


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
     * Set login
     *
     * @param  string $login
     * @return Player
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param  string $password
     * @return Player
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
     * Set role
     *
     * @param  string $role
     * @return Player
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set mail
     *
     * @param  string $mail
     * @return Player
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set lastLogin
     *
     * @param  \DateTime $lastLogin
     * @return Player
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    /**
     * Get lastLogin
     *
     * @return \DateTime 
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * Set name
     *
     * @param  string $name
     * @return Player
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
}
