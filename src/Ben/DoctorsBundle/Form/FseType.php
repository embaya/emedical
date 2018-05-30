<?php

namespace Ben\DoctorsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class FseType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('isPatient', 'choice', array(
//                'choices'  => array(
//                    'Maybe' => null,
//                    'Yes' => true,
//                    'No' => false,
//                ),
//                // *this line is important*
//                'choices_as_values' => true,
//            ))
           ->add('acte_conditionne', 'checkbox', array(
               'required'  => false,
           ))
            ->add('beneficiaire')
            ->add('patient', 'entity', array(
                // looks for choices from this entity
                'class' => 'BenDoctorsBundle:Person',

                // uses the User.username property as the visible option string
                //'choice_label' => 'username',

                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ))
            ->add('date_naissance', 'date', array(
                'widget'        => 'single_text',
                'format'        => 'dd.MM.yyyy',
            ))
            ->add('consultation')
            ->add('date_demande', 'date', array(
                'widget'        => 'single_text',
                'format'        => 'dd.MM.yyyy',
            ))
            ->add('dispense_frais', 'checkbox', array(
                'required'  => false,
            ))
            ->add('amc_organism')
//            ->add('montantTotal')
//            ->add('medecin')
           // ->add('acte')
            ->add('actes','collection',array(
                'type'=>new ActeType(),
                'label'=>false,
                'allow_add' => true,
                'by_reference' => false,
                'prototype' => true,
                'allow_delete' => true,
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ben\DoctorsBundle\Entity\Fse'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ben_doctorsbundle_fse';
    }
}
