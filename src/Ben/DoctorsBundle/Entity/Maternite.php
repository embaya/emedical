<?php

namespace Ben\DoctorsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ben\DoctorsBundle\Entity\RaisonMedicale;

/**
 * Maternite
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Maternite extends RaisonMedicale
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="datetime")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_accouchement", type="datetime")
     */
    private $dateAccouchement;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    public function getType()
    {
        return $this::TYPE_MATERNITE;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Maternite
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateAccouchement
     *
     * @param \DateTime $dateAccouchement
     *
     * @return Maternite
     */
    public function setDateAccouchement($dateAccouchement)
    {
        $this->dateAccouchement = $dateAccouchement;

        return $this;
    }

    /**
     * Get dateAccouchement
     *
     * @return \DateTime
     */
    public function getDateAccouchement()
    {
        return $this->dateAccouchement;
    }
}

