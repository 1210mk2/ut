<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Login", mappedBy="user")
     */
    protected $logins;

    /**
     * @ORM\Column(type="string", length=32)
     * @var string
     */
    protected $firstname;

    /**
     * @ORM\Column(type="string", length=64)
     * @var string
     */
    protected $lastname;

    /**
     * @ORM\Column(type="string", length=64)
     * @var string
     */
    protected $city;

    /**
     * @ORM\Column(type="string", length=32)
     * @var string
     */
    protected $country;

    /**
     * @ORM\Column(type="string", length=10)
     * @var string
     */
    protected $sex;

    /**
     * @ORM\Column(type="date")
     * @var \DateTime|null
     */
    protected $birthdate;

    /**
     * @return \DateTime|null
     */
    public function getRegisterdate()
    {
        return $this->registerdate;
    }

    /**
     * @param \DateTime|null $registerdate
     */
    public function setRegisterdate($registerdate)
    {
        $this->registerdate = $registerdate;
    }

    /**
     * @return mixed
     */
    public function getLogins()
    {
        return $this->logins;
    }

    /**
     * @param mixed $logins
     */
    public function setLogins($logins)
    {
        $this->logins = $logins;
    }

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime|null
     */
    protected $registerdate;



    public function __construct()
    {
        parent::__construct();
        $this->logins = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return \DateTime|null
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param \DateTime|null $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
//        $this->setUsername($firstname);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param string $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getFirstname() . " " . $this->getLastname();
    }
}