<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dessert
 *
 * @ORM\Table(name="dessert")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DessertRepository")
 */
class Dessert
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
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;

    /**
     * @var bool
     *
     * @ORM\Column(name="produitMaison", type="boolean")
     */
    private $produitMaison;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="decimal", precision=10, scale=2)
     */
    private $prix;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Dessert
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set produitMaison
     *
     * @param boolean $produitMaison
     *
     * @return Dessert
     */
    public function setProduitMaison($produitMaison)
    {
        $this->produitMaison = $produitMaison;

        return $this;
    }

    /**
     * Get produitMaison
     *
     * @return bool
     */
    public function getProduitMaison()
    {
        return $this->produitMaison;
    }

    /**
     * Set prix
     *
     * @param string $prix
     *
     * @return Dessert
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
}

