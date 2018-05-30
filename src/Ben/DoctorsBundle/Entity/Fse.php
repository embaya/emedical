<?php

namespace Ben\DoctorsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fse
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Ben\DoctorsBundle\Entity\FseRepository")
 */
class Fse
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
     * @ORM\Column(name="dispense_frais", type="string", length=255, nullable=true)
     */
    private $dispense_frais;

    /**
     * @var string
     *
     * @ORM\Column(name="beneficiaire", type="string", length=255, nullable=true)
     */
    private $beneficiaire;

    /**
     * @ORM\ManyToOne(targetEntity="Ben\DoctorsBundle\Entity\Person")
     * @ORM\JoinColumn(nullable=true)
     */
    private $patient;

    /**
     * @ORM\OneToOne(targetEntity="Ben\DoctorsBundle\Entity\Consultation")
     * @ORM\JoinColumn(nullable=true)
     */
    private $consultation;

    /**
     * @ORM\ManyToOne(targetEntity="Ben\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $medecin;

    /**
     * @ORM\ManyToOne(targetEntity="Ben\DoctorsBundle\Entity\AMCOrganism")
     * @ORM\JoinColumn(nullable=true)
     */
    private $amc_organism;

    /**
     * @ORM\ManyToOne(targetEntity="Ben\DoctorsBundle\Entity\Acte")
     * @ORM\JoinColumn(nullable=false)
     */
    private $actes;

    /**
     * @ORM\ManyToOne(targetEntity="Ben\DoctorsBundle\Entity\RegimePaiement")
     * @ORM\JoinColumn(nullable=false)
     */
    private $regimePaiement;
    /**
     * @var boolean
     *
     * @ORM\Column(name="acte_conditionne", type="boolean")
     */
    private $acte_conditionne;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_demande", type="date")
     */
    private $date_demande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="date")
     */
    private $date_naissance;

    /**
     * @var string
     *
     * @ORM\Column(name="montant_total", type="decimal")
     */
    private $montantTotal;

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
     * Set number
     *
     * @param integer $number
     *
     * @return Fse
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set dispenseFrais
     *
     * @param string $dispenseFrais
     *
     * @return Fse
     */
    public function setDispenseFrais($dispenseFrais)
    {
        $this->dispense_frais = $dispenseFrais;

        return $this;
    }

    /**
     * Get dispenseFrais
     *
     * @return string
     */
    public function getDispenseFrais()
    {
        return $this->dispense_frais;
    }

    /**
     * Set beneficiaire
     *
     * @param string $beneficiaire
     *
     * @return Fse
     */
    public function setBeneficiaire($beneficiaire)
    {
        $this->beneficiaire = $beneficiaire;

        return $this;
    }

    /**
     * Get beneficiaire
     *
     * @return string
     */
    public function getBeneficiaire()
    {
        return $this->beneficiaire;
    }

    /**
     * Set acteConditionne
     *
     * @param boolean $acteConditionne
     *
     * @return Fse
     */
    public function setActeConditionne($acteConditionne)
    {
        $this->acte_conditionne = $acteConditionne;

        return $this;
    }

    /**
     * Get acteConditionne
     *
     * @return boolean
     */
    public function getActeConditionne()
    {
        return $this->acte_conditionne;
    }

    /**
     * Set dateDemande
     *
     * @param \DateTime $dateDemande
     *
     * @return Fse
     */
    public function setDateDemande($dateDemande)
    {
        $this->date_demande = $dateDemande;

        return $this;
    }

    /**
     * Get dateDemande
     *
     * @return \DateTime
     */
    public function getDateDemande()
    {
        return $this->date_demande;
    }

    /**
     * Set montantTotal
     *
     * @param string $montantTotal
     *
     * @return Fse
     */
    public function setMontantTotal($montantTotal)
    {
        $this->montantTotal = $montantTotal;

        return $this;
    }

    /**
     * Get montantTotal
     *
     * @return string
     */
    public function getMontantTotal()
    {
        return $this->montantTotal;
    }

    /**
     * Set patient
     *
     * @param \Ben\DoctorsBundle\Entity\Person $patient
     *
     * @return Fse
     */
    public function setPatient(\Ben\DoctorsBundle\Entity\Person $patient = null)
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * Get patient
     *
     * @return \Ben\DoctorsBundle\Entity\Person
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * Set consultation
     *
     * @param \Ben\DoctorsBundle\Entity\Consultation $consultation
     *
     * @return Fse
     */
    public function setConsultation(\Ben\DoctorsBundle\Entity\Consultation $consultation = null)
    {
        $this->consultation = $consultation;

        return $this;
    }

    /**
     * Get consultation
     *
     * @return \Ben\DoctorsBundle\Entity\Consultation
     */
    public function getConsultation()
    {
        return $this->consultation;
    }

    /**
     * Set medecin
     *
     * @param \Ben\UserBundle\Entity\User $medecin
     *
     * @return Fse
     */
    public function setMedecin(\Ben\UserBundle\Entity\User $medecin)
    {
        $this->medecin = $medecin;

        return $this;
    }

    /**
     * Get medecin
     *
     * @return \Ben\UserBundle\Entity\User
     */
    public function getMedecin()
    {
        return $this->medecin;
    }

    /**
     * Set amcOrganism
     *
     * @param \Ben\DoctorsBundle\Entity\AMCOrganism $amcOrganism
     *
     * @return Fse
     */
    public function setAmcOrganism(\Ben\DoctorsBundle\Entity\AMCOrganism $amcOrganism = null)
    {
        $this->amc_organism = $amcOrganism;

        return $this;
    }

    /**
     * Get amcOrganism
     *
     * @return \Ben\DoctorsBundle\Entity\AMCOrganism
     */
    public function getAmcOrganism()
    {
        return $this->amc_organism;
    }

    /**
     * Set actes
     *
     * @param \Ben\DoctorsBundle\Entity\Acte $acte
     *
     * @return Fse
     */
    public function setActe(\Ben\DoctorsBundle\Entity\Acte $actes)
    {
        $this->actes = $actes;

        return $this;
    }

    /**
     * Get actes
     *
     * @return \Ben\DoctorsBundle\Entity\Acte
     */
    public function getActes()
    {
        return $this->actes;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Fse
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->date_naissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->date_naissance;
    }

    /**
     * Set actes
     *
     * @param \Ben\DoctorsBundle\Entity\Acte $actes
     *
     * @return Fse
     */
    public function setActes(\Ben\DoctorsBundle\Entity\Acte $actes)
    {
        $this->actes = $actes;

        return $this;
    }

    /**
     * Set regimePaiement
     *
     * @param \Ben\DoctorsBundle\Entity\RegimePaiement $regimePaiement
     *
     * @return Fse
     */
    public function setRegimePaiement(\Ben\DoctorsBundle\Entity\RegimePaiement $regimePaiement)
    {
        $this->regimePaiement = $regimePaiement;

        return $this;
    }

    /**
     * Get regimePaiement
     *
     * @return \Ben\DoctorsBundle\Entity\RegimePaiement
     */
    public function getRegimePaiement()
    {
        return $this->regimePaiement;
    }
}
