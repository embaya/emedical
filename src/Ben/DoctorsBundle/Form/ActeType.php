<?php

namespace Ben\DoctorsBundle\Form;

use Ben\DoctorsBundle\Entity\RaisonMedicale;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Ben\DoctorsBundle\Form\AbstractActeType;
use Ben\DoctorsBundle\Entity\AbstractActe;

class ActeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('date', 'date', array(
                'widget'        => 'single_text',
                'format'        => 'dd.MM.yyyy',
            ))
            //->add('actetype', 'collection', array('type' => new AbstractActeType('Ben\DoctorsBundle\Entity\AbstractActe')))
//                array(
//                    'type'         => new \Ben\DoctorsBundle\Form\AbstractActeType(),
//                    'allow_add' => true,
//                    'options'      => array('data_class' => 'Ben\DoctorsBundle\Entity\AbstractActe'),
//                    'by_reference' => false,
//
//                ))
            //->add('actetype')
            ->add('actetype', 'choice', array(
                'required' => true,
                'choices' => AbstractActe::getAvailableTypes(),
                'choices_as_values' => true,
                'choice_label' => function($choice) {
                    return AbstractActe::getTypeName($choice);
                },
//                'attr' => array(
//                    'class' => 'acte_type'
//                )
            ))
            ->add('raisonMedicale', 'choice', array(
                'required' => true,
                'choices' => RaisonMedicale::getAvailableTypes(),
                'choices_as_values' => true,
                'choice_label' => function($choice) {
                    return RaisonMedicale::getTypeName($choice);
                },
//                'attr' => array(
//                    'class' => 'raison_medicale'
//                )
            ))

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ben\DoctorsBundle\Entity\Acte'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ben_doctorsbundle_acte';
    }
}
