<?php

namespace Ben\DoctorsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbstractAct
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({AbstractActe::TYPE_ACTECCAM = "ActeCCAM", AbstractActe::TYPE_ACTENGAP="ActeNGAP"})
 */
abstract class AbstractActe
{
    const TYPE_ACTECCAM = 'acteccam';
    const TYPE_ACTENGAP = 'actengap';
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
        self::TYPE_ACTECCAM    => 'ActeCCAM',
        self::TYPE_ACTENGAP => 'ActeNGAP',
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
            self::TYPE_ACTECCAM,
            self::TYPE_ACTENGAP,
        );
    }
}

