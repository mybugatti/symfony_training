<?php
/**
 * Created by PhpStorm.
 * User: heredia
 * Date: 18/11/16
 * Time: 17:57
 */

namespace HrBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * HrBundle\Entity\User
 * @ORM\Entity
 * @ORM\Table(name="user")
 */

class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Assert\Email(message = "The email '{{ value }}' is not a valid email.", checkMX = true )
     * @ORM\Column(type="string", length=13)
     */
    protected $email;

    /**
     *
     * @ORM\Column(type="string", length=50)
     */
    protected $password;

    /**
     * @ORM\Column(type="string")
     * @Assert\Length(min="6")
     * @Assert\Type(type="string", message="Le prénom ne doit contenir que des caractères.")
     */
    protected $lastname;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $firtname;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $address;

    /**
     * @ORM\Column(type="integer", length=50)
     */
    protected $zip_code;

    /**
     * @Assert\Date()
     * @ORM\Column(type="date", length=50)
     */
    protected $birthDate;

    /**
     * @ORM\Column(type="datetime", length=50)
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime", length=50)
     */
    protected $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="Book", mappedBy="user")
     */
    protected $book;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->book = new ArrayCollection();
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
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firtname
     *
     * @param string $firtname
     * @return User
     */
    public function setFirtname($firtname)
    {
        $this->firtname = $firtname;

        return $this;
    }

    /**
     * Get firtname
     *
     * @return string 
     */
    public function getFirtname()
    {
        return $this->firtname;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set zip_code
     *
     * @param integer $zipCode
     * @return User
     */
    public function setZipCode($zipCode)
    {
        $this->zip_code = $zipCode;

        return $this;
    }

    /**
     * Get zip_code
     *
     * @return integer 
     */
    public function getZipCode()
    {
        return $this->zip_code;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     * @return User
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime 
     */
    public function getBirthDate()
    {
        return $this->birthDate;
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
     * Add book
     *
     * @param \HrBundle\Entity\Book $book
     * @return User
     */
    public function addBook(\HrBundle\Entity\Book $book)
    {
        $this->book[] = $book;

        return $this;
    }

    /**
     * Remove book
     *
     * @param \HrBundle\Entity\Book $book
     */
    public function removeBook(\HrBundle\Entity\Book $book)
    {
        $this->book->removeElement($book);
    }

    /**
     * Get book
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBook()
    {
        return $this->book;
    }
}
