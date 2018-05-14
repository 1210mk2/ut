<?php
/**
 * Created by PhpStorm.
 * User: grin
 * Date: 14.05.2018
 * Time: 11:51
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="login")
 */
class Login
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="logins")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\Column(type="date")
     * @var \DateTime|null
     */
    protected $login_date;


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
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return \DateTime|null
     */
    public function getLoginDate()
    {
        return $this->login_date;
    }

    /**
     * @param \DateTime|null $login_date
     */
    public function setLoginDate($login_date)
    {
        $this->login_date = $login_date;
    }

    public function __construct()
    {
    }

}