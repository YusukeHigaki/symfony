<?php

namespace Acme\RentacarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Acme\RentacarBundle\Entity\UserRepository")
 */
class User
{
    const PASSWORD_SALT = '9q834fh98ytq98ethq0pasdf';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     *
     * @Assert\NotBlank
     * @Assert\Length(
     *    max = "100"
     * )
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     *
     * @Assert\NotBlank
     * @Assert\Email
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=100, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=20, nullable=false)
     *
     * @Assert\NotBlank
     */
    private $tel;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="date", nullable=false)
     *
     * @Assert\NotBlank
     * @Assert\Date
     */
    private $birthday;

    /**
     * @var string
     *
     * @ORM\Column(name="activation_key", type="string", length=100, nullable=false)
     */
    private $activationKey;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
	 * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
	 * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @Assert\NotBlank
     * @Assert\Length(
     *    min = "8"
     * )
     */
    private $rawPassword;

    /**
     * Set id
     *
     * @param integer $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set name
     *
     * @param string $name
     * @return User
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
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
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
     * Set tel
     *
     * @param string $tel
     * @return User
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return User
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }


    /**
     * Get birthday
     *
     * @return \DateTime 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set activationKey
     *
     * @param string $activationKey
     * @return User
     */
    public function setActivationKey($activationKey)
    {
        $this->activationKey = $activationKey;

        return $this;
    }

    /**
     * Get activationKey
     *
     * @return string 
     */
    public function getActivationKey()
    {
        return $this->activationKey;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return User
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set rawPassword
     *
     * @param string $rawPassword
     */
    public function setRawPassword($rawPassword)
    {
        $this->rawPassword = $rawPassword;
        $this->password = self::hashPassword($rawPassword);
    }

    public function getRawPassword()
    {
        return $this->rawPassword;
    }

    /**
     * Is given password valid?
     *
     * @param string $rawPassword
     * @return boolean
     */
    public function isValidPassword($rawPassword)
    {
        if($this->password === self::hashPassword($rawPassword)){
            return true;
        }
        return false;
    }

    /**
     * Hash Password
     *
     * @param string $rawPassword
     * @return string
     */
    protected static function hashPassword($rawPassword)
    {
        return sha1($rawPassword,self::PASSWORD_SALT);
    }


}
