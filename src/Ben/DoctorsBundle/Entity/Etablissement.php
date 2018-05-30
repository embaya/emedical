<?php

namespace Ben\DoctorsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etablissement
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Etablissement
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_finess", type="integer")
     */
    private $numFiness;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="postal", type="string", length=255)
     */
    private $postal;

    /**
     * @ORM\OneToOne(targetEntity="Ben\DoctorsBundle\Entity\image", cascade={"remove", "persist"})
     */
    private $cachet;

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
     * Set name
     *
     * @param string $name
     *
     * @return Etablissement
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
     * Set numFiness
     *
     * @param integer $numFiness
     *
     * @return Etablissement
     */
    public function setNumFiness($numFiness)
    {
        $this->numFiness = $numFiness;

        return $this;
    }

    /**
     * Get numFiness
     *
     * @return integer
     */
    public function getNumFiness()
    {
        return $this->numFiness;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Etablissement
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
     * Set city
     *
     * @param string $city
     *
     * @return Etablissement
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
     * Set postal
     *
     * @param string $postal
     *
     * @return Etablissement
     */
    public function setPostal($postal)
    {
        $this->postal = $postal;

        return $this;
    }

    /**
     * Get postal
     *
     * @return string
     */
    public function getPostal()
    {
        return $this->postal;
    }

    /**
     * Set cachet
     *
     * @param \Ben\DoctorsBundle\Entity\image $cachet
     * @return profile
     */
    public function setCachet(\Ben\DoctorsBundle\Entity\image $cachet = null)
    {
        $this->cachet = $cachet;

        return $this;
    }

    /**
     * Get cachet
     *
     * @return \Ben\DoctorsBundle\Entity\image
     */
    public function getCachet()
    {
        return $this->cachet;
    }

    /**
     * Get etabCachet
     *
     * @return string
     */
    public function getEtabCachet() {

        return $this->cachet->getWebPath();
    }
}

