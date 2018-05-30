<?php

namespace Ben\DoctorsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ben\DoctorsBundle\Entity\RaisonMedicale;

/**
 * Maladie
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Maladie extends RaisonMedicale
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cause_accident", type="boolean")
     */
    private $causeAccident;


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
     * toString
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getNom();
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Maladie
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
     * Set causeAccident
     *
     * @param boolean $causeAccident
     *
     * @return Maladie
     */
    public function setCauseAccident($causeAccident)
    {
        $this->causeAccident = $causeAccident;

        return $this;
    }

    /**
     * Get causeAccident
     *
     * @return boolean
     */
    public function getCauseAccident()
    {
        return $this->causeAccident;
    }
}

