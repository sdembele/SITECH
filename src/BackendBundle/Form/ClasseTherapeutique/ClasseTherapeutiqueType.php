<?php

namespace BackendBundle\Form\ClasseTherapeutique;

use BackendBundle\Form\Type\PharmacieType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClasseTherapeutiqueType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('description')
            ->add('pharmacie',EntityType::class,array(
                'class'        => 'BackendBundle:Pharmacie',
                'choice_label' => 'nom',
            ))
            ->add('classe',EntityType::class, array(
                'class'=>'BackendBundle:ClasseTherapeutique',
                'choice_label'=>'libelle',)
            );
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackendBundle\Entity\ClasseTherapeutique'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'backendbundle_classetherapeutique';
    }


}
