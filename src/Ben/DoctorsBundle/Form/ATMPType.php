<?php

namespace Ben\DoctorsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Ben\DoctorsBundle\Form\RaisonMedicaleType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Ben\DoctorsBundle\Entity\AbstractActe;

class ATMPType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //parent::buildForm($builder, $options);
        $builder
            ->add('number')
            ->add('date', 'date', array(
                'widget'        => 'single_text',
                'format'        => 'dd.MM.yyyy',
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ben\DoctorsBundle\Entity\ATMP'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ben_doctorsbundle_atmp';
    }
}
