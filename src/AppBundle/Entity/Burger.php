<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints\File;

/**
 * Burger
 *
 * @ORM\Table(name="burger")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BurgerRepository")
 */
class Burger
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * @var UploadedFile
     *
     * @ORM\Column(name="thumbnail", type="string", length= 255, nullable=true)
     * @File(mimeTypes={"image/jpeg","image/png"})
     */
    private $thumbnail;


    /**
     *
     * @var bool
     * @ORM\Column(name="publish", type="boolean")
     */
    private $publish;
    
    
     /**
     *
     * @var array
     * @ORM\ManyToMany(targetEntity = "Ingredient", cascade={"persist", "remove"})
     * @JoinTable(name="ingredient_list")
     */
    private $ingredient;
    
     /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity = "Categorie")
     * @ORM\JoinColumn(name = "fk_categorie", referencedColumnName = "id")
     */
    private $categorie;
    
    
   /**
    *
    * @var DateTime
    * @ORM\Column(name="date", type="datetime")
    */
    private $date;
    
    
    
    public function __construct()
{
    $this->date = new DateTime();
}
       
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Burger
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
     * Set description
     *
     * @param string $description
     *
     * @return Burger
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
     * Set price
     *
     * @param string $price
     *
     * @return Burger
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set thumbnail
     *
     * @param string $thumbnail
     *
     * @return Burger
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * Get thumbnail
     *
     * @return string
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }
    
    /**
     * Set publish
     *
     * @param boolean $publish
     *
     * @return Burger
     */
    public function setPublish($publish)
    {
        $this->publish = $publish;
        return $this;
    }
    
    /**
     * Get publish
     *
     * @return bool
     */
    public function getPublish()
    {
        return $this->publish;
    }
    
    
      /**
     * Get ingredient
     *
     * @return string
     */
    public function getIngredient() {
        return $this->ingredient;
    }
    
    /**
     * Set ingredient
     *
     * @param string $ingredient
     *
     * @return Burger
     */
    public function setIngredient($ingredient) {
        $this->ingredient = $ingredient;
    }
    
    
    
    public function getCategorie() {
        return $this->categorie;
    }

    public function setCategorie($categorie) {
        $this->categorie = $categorie;
    }

    
    public function getDate() {
        return $this->date;
    }

    public function setDate(DateTime $date) {
        $this->date = $date;
    }

            
    
      public function __toString() {
        return $this->getName();
    }
    
    
}

