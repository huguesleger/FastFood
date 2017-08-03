<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * BurgerSpecial
 *
 * @ORM\Table(name="burger_special")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BurgerSpecialRepository")
 * @UniqueEntity("name", message="Ce nom existe déjà.")
 */
class BurgerSpecial
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * @Assert\Length(
     *      min = 10,
     *      max = 250,
     *      minMessage = "le texte doit avoir minimum {{ limit }} caratères"
     * ) 
     */
    private $description;

    /**
     * @var Datetime
     *
     * @ORM\Column(name="dateDebut", type="date")
     */
    private $dateDebut;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="datefin", type="date")
     */
    private $datefin;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="decimal", precision=10, scale=2)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @var bool
     *
     * @ORM\Column(name="publier", type="boolean")
     */
    private $publier;


     /**
     *
     * @var array
     * @ORM\ManyToMany(targetEntity = "Ingredient", cascade={"persist", "remove"})
     * @JoinTable(name="ingredient_list_special")
     */
    private $ingredient;
    
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
     * @return BurgerSpecial
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
     * @return BurgerSpecial
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
     * Set dateDebut
     *
     * @param DateTime $dateDebut
     *
     * @return BurgerSpecial
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set datefin
     *
     * @param DateTime $datefin
     *
     * @return BurgerSpecial
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;

        return $this;
    }

    /**
     * Get datefin
     *
     * @return DateTime
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * Set prix
     *
     * @param string $prix
     *
     * @return BurgerSpecial
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return BurgerSpecial
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
     * Set publier
     *
     * @param boolean $publier
     *
     * @return BurgerSpecial
     */
    public function setPublier($publier)
    {
        $this->publier = $publier;

        return $this;
    }

    /**
     * Get publier
     *
     * @return bool
     */
    public function getPublier()
    {
        return $this->publier;
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
    
      public function __toString() {
        return $this->getName();
    }
}

