<?php
/**
 * Created by PhpStorm.
 * User: heredia
 * Date: 08/12/16
 * Time: 14:46
 */

namespace HrBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="cover")
 */
class Cover
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
    protected $title;

    /**
     * @ORM\Column(type="text", length=200)
     */
    protected $description;

    /**
     * @ORM\Column(type="string", length=13)
     */
    protected $file_path;



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
     * Set title
     *
     * @param string $title
     * @return Cover
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Cover
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set file_path
     *
     * @param string $filePath
     * @return Cover
     */
    public function setFilePath($filePath)
    {
        $this->file_path = $filePath;

        return $this;
    }

    /**
     * Get file_path
     *
     * @return string 
     */
    public function getFilePath()
    {
        return $this->file_path;
    }
}
