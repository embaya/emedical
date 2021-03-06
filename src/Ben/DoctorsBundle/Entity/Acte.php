<?php

namespace Ben\DoctorsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acte
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Acte
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
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Ben\DoctorsBundle\Entity\AbstractActe")
     * @ORM\JoinColumn(nullable=true)
     */
    private $actetype;

    /**
     * @ORM\ManyToOne(targetEntity="Ben\DoctorsBundle\Entity\RaisonMedicale")
     * @ORM\JoinColumn(nullable=false)
     */
    private $raisonMedicale;

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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Acte
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->acteCcam = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set acteNgap
     *
     * @param \Ben\DoctorsBundle\Entity\ActeNGAP $acteNgap
     *
     * @return Acte
     */
    public function setActeNgap(\Ben\DoctorsBundle\Entity\ActeNGAP $acteNgap = null)
    {
        $this->acteNgap = $acteNgap;

        return $this;
    }

    /**
     * Get acteNgap
     *
     * @return \Ben\DoctorsBundle\Entity\ActeNGAP
     */
    public function getActeNgap()
    {
        return $this->acteNgap;
    }

    /**
     * Add acteCcam
     *
     * @param \Ben\DoctorsBundle\Entity\ActeCCAM $acteCcam
     *
     * @return Acte
     */
    public function addActeCcam(\Ben\DoctorsBundle\Entity\ActeCCAM $acteCcam)
    {
        $this->acteCcam[] = $acteCcam;

        return $this;
    }

    /**
     * Remove acteCcam
     *
     * @param \Ben\DoctorsBundle\Entity\ActeCCAM $acteCcam
     */
    public function removeActeCcam(\Ben\DoctorsBundle\Entity\ActeCCAM $acteCcam)
    {
        $this->acteCcam->removeElement($acteCcam);
    }

    /**
     * Get acteCcam
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActeCcam()
    {
        return $this->acteCcam;
    }

    /**
     * Set maladie
     *
     * @param \Ben\DoctorsBundle\Entity\Maladie $maladie
     *
     * @return Acte
     */
    public function setMaladie(\Ben\DoctorsBundle\Entity\Maladie $maladie = null)
    {
        $this->maladie = $maladie;

        return $this;
    }

    /**
     * Get maladie
     *
     * @return \Ben\DoctorsBundle\Entity\Maladie
     */
    public function getMaladie()
    {
        return $this->maladie;
    }

    /**
     * Set maternite
     *
     * @param \Ben\DoctorsBundle\Entity\Maternite $maternite
     *
     * @return Acte
     */
    public function setMaternite(\Ben\DoctorsBundle\Entity\Maternite $maternite)
    {
        $this->maternite = $maternite;

        return $this;
    }

    /**
     * Get maternite
     *
     * @return \Ben\DoctorsBundle\Entity\Maternite
     */
    public function getMaternite()
    {
        return $this->maternite;
    }

    /**
     * Set atmp
     *
     * @param \Ben\DoctorsBundle\Entity\ATMP $atmp
     *
     * @return Acte
     */
    public function setAtmp(\Ben\DoctorsBundle\Entity\ATMP $atmp = null)
    {
        $this->atmp = $atmp;

        return $this;
    }

    /**
     * Get atmp
     *
     * @return \Ben\DoctorsBundle\Entity\ATMP
     */
    public function getAtmp()
    {
        return $this->atmp;
    }

    /**
     * Set raisonMedicale
     *
     * @param \Ben\DoctorsBundle\Entity\RaisonMedicale $raisonMedicale
     *
     * @return Acte
     */
    public function setRaisonMedicale(\Ben\DoctorsBundle\Entity\RaisonMedicale $raisonMedicale = null)
    {
        $this->raisonMedicale = $raisonMedicale;

        return $this;
    }

    /**
     * Get raisonMedicale
     *
     * @return \Ben\DoctorsBundle\Entity\RaisonMedicale
     */
    public function getRaisonMedicale()
    {
        return $this->raisonMedicale;
    }

    /**
     * Set actetype
     *
     * @param \Ben\DoctorsBundle\Entity\AbstractActe $actetype
     *
     * @return Acte
     */
    public function setActetype(\Ben\DoctorsBundle\Entity\AbstractActe $actetype = null)
    {
        $this->actetype = $actetype;

        return $this;
    }

    /**
     * Get actetype
     *
     * @return \Ben\DoctorsBundle\Entity\AbstractActe
     */
    public function getActetype()
    {
        return $this->actetype;
    }
}
