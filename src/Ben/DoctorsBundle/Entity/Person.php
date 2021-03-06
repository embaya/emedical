<?php

namespace Ben\DoctorsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table(name="person")
 * @ORM\Entity(repositoryClass="Ben\DoctorsBundle\Entity\PersonRepository")
 */
class Person
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
     * @ORM\Column(name="cin", type="string", length=255)
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="nss", type="string", length=255)
     */
    private $nss;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="familyname", type="string", length=255)
     */
    private $familyname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="date")
     */
    private $birthday;

    /**
     * @var string
     *
     * @ORM\Column(name="birthcity", type="string", length=255, nullable=true)
     */
    private $birthcity;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=255)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="contry", type="string", length=255, nullable=true)
     */
    private $contry;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="gsm", type="string", length=255, nullable=true)
     */
    private $gsm;

    /**
     * @var string
     *
     * @ORM\Column(name="cnss", type="string", length=255)
     */
    private $cnss;

    /**
     * @var boolean
     * @ORM\Column(name="ishandicap", type="boolean", nullable=true)
     * 
     */
    private $ishandicap;

    /**
     * @var string
     *
     * @ORM\Column(name="handicap", type="string", length=255, nullable=true)
     */
    private $handicap;

    /**
     * @var string
     *
     * @ORM\Column(name="needs", type="text", nullable=true)
     */
    private $needs;


    /**
     * @var \DateTime $created
     *
     * @ORM\Column(name="created", type="datetime")
     */
    protected $created;

    /**
    * @ORM\OneToMany(targetEntity="Ben\DoctorsBundle\Entity\Antecedent", mappedBy="person", cascade={"remove", "persist"})
    */
    protected $antecedents;

    /**
    * @ORM\OneToMany(targetEntity="Ben\DoctorsBundle\Entity\Consultation", mappedBy="person", cascade={"remove", "persist"})
    */
    protected $consultations;

    /**
     * @ORM\ManyToOne(targetEntity="Ben\DoctorsBundle\Entity\AMCOrganism")
     * @ORM\JoinColumn(nullable=false)
     */
    private $assureur;


    /************ constructeur ************/
    
    public function __construct()
    {
        $this->birthday =  new \DateTime;
        $this->created = new \DateTime;
        $this->antecedents = new \Doctrine\Common\Collections\ArrayCollection();
        $this->consultations = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /************ getters & setters  ************/

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
     * Get FullName
     *
     * @return string 
     */
    public function __toString()
    {
        return $this->getFullName();
    }

    /**
     * Set cin
     *
     * @param string $cin
     * @return Person
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return string 
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set nss
     *
     * @param string $nss
     * @return Person
     */
    public function setNss($nss)
    {
        $this->nss = $nss;

        return $this;
    }

    /**
     * Get nss
     *
     * @return string 
     */
    public function getNss()
    {
        return $this->nss;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return Person
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set familyname
     *
     * @param string $familyname
     * @return Person
     */
    public function setFamilyname($familyname)
    {
        $this->familyname = $familyname;

        return $this;
    }

    /**
     * Get familyname
     *
     * @return string 
     */
    public function getFamilyname()
    {
        return $this->familyname;
    }

    /**
     * Get FullName
     *
     * @return string 
     */
    public function getFullName()
    {
        return $this->familyname.' '.$this->firstname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Person
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return Person
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set birthcity
     *
     * @param string $birthcity
     * @return Person
     */
    public function setBirthcity($birthcity)
    {
        $this->birthcity = $birthcity;

        return $this;
    }

    /**
     * Get birthcity
     *
     * @return string 
     */
    public function getBirthcity()
    {
        return $this->birthcity;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Person
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set contry
     *
     * @param string $contry
     * @return Person
     */
    public function setContry($contry)
    {
        $this->contry = $contry;

        return $this;
    }

    /**
     * Get contry
     *
     * @return string 
     */
    public function getContry()
    {
        return $this->contry;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Person
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Person
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set gsm
     *
     * @param string $gsm
     * @return Person
     */
    public function setGsm($gsm)
    {
        $this->gsm = $gsm;

        return $this;
    }

    /**
     * Get gsm
     *
     * @return string 
     */
    public function getGsm()
    {
        return $this->gsm;
    }

    /**
     * Set cnss
     *
     * @param string $cnss
     * @return Person
     */
    public function setCnss($cnss)
    {
        $this->cnss = $cnss;

        return $this;
    }

    /**
     * Get cnss
     *
     * @return string 
     */
    public function getCnss()
    {
        return $this->cnss;
    }


    /**
     * Add antecedents
     *
     * @param \Ben\DoctorsBundle\Entity\Antecedent $antecedents
     * @return Person
     */
    public function addAntecedent(\Ben\DoctorsBundle\Entity\Antecedent $antecedents)
    {
        $this->antecedents[] = $antecedents;

        return $this;
    }

    /**
     * Remove antecedents
     *
     * @param \Ben\DoctorsBundle\Entity\Antecedent $antecedents
     */
    public function removeAntecedent(\Ben\DoctorsBundle\Entity\Antecedent $antecedents)
    {
        $this->antecedents->removeElement($antecedents);
    }

    /**
     * Get antecedents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAntecedents()
    {
        return $this->antecedents;
    }

    /**
     * Add consultations
     *
     * @param \Ben\DoctorsBundle\Entity\Consultation $consultations
     * @return Person
     */
    public function addConsultation(\Ben\DoctorsBundle\Entity\Consultation $consultations)
    {
        $this->consultations[] = $consultations;

        return $this;
    }

    /**
     * Remove consultations
     *
     * @param \Ben\DoctorsBundle\Entity\Consultation $consultations
     */
    public function removeConsultation(\Ben\DoctorsBundle\Entity\Consultation $consultations)
    {
        $this->consultations->removeElement($consultations);
    }

    /**
     * Get consultations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getConsultations()
    {
        return $this->consultations;
    }

    /**
     * Set ishandicap
     *
     * @param boolean $ishandicap
     * @return Person
     */
    public function setIshandicap($ishandicap)
    {
        $this->ishandicap = $ishandicap;

        return $this;
    }

    /**
     * Get ishandicap
     *
     * @return boolean 
     */
    public function getIshandicap()
    {
        return $this->ishandicap;
    }

    /**
     * Set handicap
     *
     * @param string $handicap
     * @return Person
     */
    public function setHandicap($handicap)
    {
        $this->handicap = $handicap;

        return $this;
    }

    /**
     * Get handicap
     *
     * @return string 
     */
    public function getHandicap()
    {
        return $this->handicap;
    }

    /**
     * Set needs
     *
     * @param string $needs
     * @return Person
     */
    public function setNeeds($needs)
    {
        $this->needs = $needs;

        return $this;
    }

    /**
     * Get needs
     *
     * @return string 
     */
    public function getNeeds()
    {
        return $this->needs;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Person
     */
    public function setCreated($created) {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated() {
        return $this->created;
    }
}
