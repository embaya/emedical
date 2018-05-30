<?php

namespace Ben\DoctorsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ben\DoctorsBundle\Entity\AbstractActe;

/**
 * ActeCCAM
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ActeCCAM extends AbstractActe
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
     * @ORM\Column(name="tarif_base", type="decimal")
     */
    private $tarifBase;

    /**
     * @var string
     *
     * @ORM\Column(name="code_association", type="string", length=255)
     */
    private $codeAssociation;

    /**
     * @var string
     *
     * @ORM\Column(name="code_modificateur", type="string")
     */
    private $codeModificateur;

    /**
     * @var string
     *
     * @ORM\Column(name="code_condition", type="string", length=255)
     */
    private $codeCondition;

    /**
     * @var string
     *
     * @ORM\Column(name="code_activite", type="string", length=255)
     */
    private $codeActivite;

    public function getType()
    {
        return $this::TYPE_ACTECCAM;
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
        return $this->getCode().' - '.$this->getLibelle();
    }
    /**
     * Set code
     *
     * @param string $code
     *
     * @return ActeCCAM
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
     * @return ActeCCAM
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
     * Set tarifBase
     *
     * @param string $tarifBase
     *
     * @return ActeCCAM
     */
    public function setTarifBase($tarifBase)
    {
        $this->tarifBase = $tarifBase;

        return $this;
    }

    /**
     * Get tarifBase
     *
     * @return string
     */
    public function getTarifBase()
    {
        return $this->tarifBase;
    }

    /**
     * Set codeAssociation
     *
     * @param string $codeAssociation
     *
     * @return ActeCCAM
     */
    public function setCodeAssociation($codeAssociation)
    {
        $this->codeAssociation = $codeAssociation;

        return $this;
    }

    /**
     * Get codeAssociation
     *
     * @return string
     */
    public function getCodeAssociation()
    {
        return $this->codeAssociation;
    }

    /**
     * Set codeModificateur
     *
     * @param array $codeModificateur
     *
     * @return ActeCCAM
     */
    public function setCodeModificateur($codeModificateur)
    {
        $this->codeModificateur = $codeModificateur;

        return $this;
    }

    /**
     * Get codeModificateur
     *
     * @return array
     */
    public function getCodeModificateur()
    {
        return $this->codeModificateur;
    }

    /**
     * Set codeCondition
     *
     * @param string $codeCondition
     *
     * @return ActeCCAM
     */
    public function setCodeCondition($codeCondition)
    {
        $this->codeCondition = $codeCondition;

        return $this;
    }

    /**
     * Get codeCondition
     *
     * @return string
     */
    public function getCodeCondition()
    {
        return $this->codeCondition;
    }

    /**
     * Set codeActivite
     *
     * @param string $codeActivite
     *
     * @return ActeCCAM
     */
    public function setCodeActivite($codeActivite)
    {
        $this->codeActivite = $codeActivite;

        return $this;
    }

    /**
     * Get codeActivite
     *
     * @return string
     */
    public function getCodeActivite()
    {
        return $this->codeActivite;
    }
}

