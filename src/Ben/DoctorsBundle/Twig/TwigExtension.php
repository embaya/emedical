<?php

namespace Ben\DoctorsBundle\Twig;

class TwigExtension extends \Twig_Extension {

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('age', array($this, 'ageCalculate')),
        );
    }

    public function ageCalculate(\DateTime $bithdayDate)
    {
        $now = new \DateTime();
        $interval = $now->diff($bithdayDate);

        return $interval->y;
    }

    public function getName()
    {
        return 'twig_extension';
    }

}