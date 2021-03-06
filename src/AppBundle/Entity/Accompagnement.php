<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Accompagnement
 *
 * @ORM\Table(name="accompagnement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AccompagnementRepository")
 * @UniqueEntity("name", message="Ce nom existe déjà.")
 */
class Accompagnement
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
     * @ORM\ManyToOne(targetEntity = "Icon")
     * @ORM\JoinColumn(name = "fk_icon", referencedColumnName = "id")
     */
    private $icon;

   
    
    

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
     * @return Accompagnement
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
     * Get icon
     *
     * @return string
     */
    public function getIcon() {
        return $this->icon;
    }
    
    
     /**
     * Set icon
     *
     * @param string $icon
     *
     * @return Accompagnement
     */
    public function setIcon($icon) {
        $this->icon = $icon;
    }

       public function __toString() {
        return $this->getIcon();
    }
    
}

