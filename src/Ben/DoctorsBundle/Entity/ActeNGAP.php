<?php

namespace Ben\DoctorsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ben\DoctorsBundle\Entity\AbstractActe;

/**
 * ActeNGAP
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ActeNGAP extends AbstractActe
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
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="prix_base", type="decimal")
     */
    private $prixBase;

    /**
     * @ORM\ManyToOne(targetEntity="Ben\DoctorsBundle\Entity\DepacementNGAP")
     * @ORM\JoinColumn(nullable=false)
     */
    private $depacement;

    public function getType()
    {
        return $this::TYPE_ACTENGAP;
    }

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
        return $this->getLibelle();
    }


    /**
     * Set code
     *
     * @param string $code
     *
     * @return ActeNGAP
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return ActeNGAP
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set prixBase
     *
     * @param string $prixBase
     *
     * @return ActeNGAP
     */
    public function setPrixBase($prixBase)
    {
        $this->prixBase = $prixBase;

        return $this;
    }

    /**
     * Get prixBase
     *
     * @return string
     */
    public function getPrixBase()
    {
        return $this->prixBase;
    }
}

