<?php

namespace Ben\DoctorsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * RaisonMedicale
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({RaisonMedicale::TYPE_MALADIE = "Maladie", RaisonMedicale::TYPE_MATERNITE="Maternite",RaisonMedicale::TYPE_ATMP="ATMP"})
 */
abstract class RaisonMedicale
{
    const TYPE_MALADIE = 'maladie';
    const TYPE_MATERNITE = 'maternite';
    const TYPE_ATMP = 'atmp';
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /** @var array user friendly named type */
    protected static $typeName = array(
        self::TYPE_MALADIE    => 'Maladie',
        self::TYPE_MATERNITE => 'Maternite',
        self::TYPE_ATMP => 'ATMP',
    );

    /**
     * @param  string $typeShortName
     * @return string
     */
    public static function getTypeName($typeShortName)
    {
        if (!isset(static::$typeName[$typeShortName])) {
            return "Unknown type ($typeShortName)";
        }

        return static::$typeName[$typeShortName];
    }

    /**
     * @return array<string>
     */
    public static function getAvailableTypes()
    {
        return array(
            self::TYPE_MALADIE,
            self::TYPE_MATERNITE,
            self::TYPE_ATMP,
        );
    }
}

