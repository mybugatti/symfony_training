<?php
/**
 * Created by PhpStorm.
 * User: heredia
 * Date: 08/12/16
 * Time: 14:12
 */

namespace HrBundle\Entity;
use Doctrine\ORM\Mapping as ORM;



/**
 * @ORM\Entity
 * @ORM\Table(name="author")
 */
class Author
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=13)
     */
    protected $last_name;

    /**
     * @ORM\Column(type="string", length=13)
     */
    protected $first_name;


    /**
     * @ORM\Column(type="datetime", length=50)
     */
    protected $birth_date;

    /**
     * @ORM\Column(type="datetime", length=50)
     */
    protected $created_at;

    /**
     * @ORM\Column(type="datetime", length=50)
     */
    protected $updated_at;

    /**
     * @ORM\ManyToMany(targetEntity="Book", inversedBy="book")
     * @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     */
    protected $book;

    /**
     * @ORM\OneToOne(targetEntity="Cover", inversedBy="cover", cascade={"persist"})
     */
    protected $cover;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->book = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set last_name
     *
     * @param string $lastName
     * @return Author
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set first_name
     *
     * @param string $firstName
     * @return Author
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get first_name
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set birth_date
     *
     * @param \DateTime $birthDate
     * @return Author
     */
    public function setBirthDate($birthDate)
    {
        $this->birth_date = $birthDate;

        return $this;
    }

    /**
     * Get birth_date
     *
     * @return \DateTime 
     */
    public function getBirthDate()
    {
        return $this->birth_date;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Author
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Author
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Add book
     *
     * @param \HrBundle\Entity\Book $book
     * @return Author
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

    /**
     * Set cover
     *
     * @param \HrBundle\Entity\Cover $cover
     * @return Author
     */
    public function setCover(\HrBundle\Entity\Cover $cover = null)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get cover
     *
     * @return \HrBundle\Entity\Cover 
     */
    public function getCover()
    {
        return $this->cover;
    }
}
