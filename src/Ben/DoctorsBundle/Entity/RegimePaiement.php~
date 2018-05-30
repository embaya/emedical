<?php

namespace Ben\DoctorsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RegimePaiement
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class RegimePaiement
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
     * @ORM\Column(name="amo", type="string", length=255)
     */
    private $amo;

    /**
     * @var string
     *
     * @ORM\Column(name="amc", type="string", length=255)
     */
    private $amc;


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
     * Set amo
     *
     * @param string $amo
     *
     * @return RegimePaiement
     */
    public function setAmo($amo)
    {
        $this->amo = $amo;

        return $this;
    }

    /**
     * Get amo
     *
     * @return string
     */
    public function getAmo()
    {
        return $this->amo;
    }

    /**
     * Set amc
     *
     * @param string $amc
     *
     * @return RegimePaiement
     */
    public function setAmc($amc)
    {
        $this->amc = $amc;

        return $this;
    }

    /**
     * Get amc
     *
     * @return string
     */
    public function getAmc()
    {
        return $this->amc;
    }
}

