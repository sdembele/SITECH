<?php
/**
 * Created by PhpStorm.
 * User: Souleman
 * Date: 23/07/2017
 * Time: 18:01
 */

namespace BackendBundle\Form\Type;



use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class PharmacieType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('adresse1', TextType::class)
            ->add('adresse2', TextType::class)
            ->add('email', EmailType::class)
            ->add('telephone', TextType::class)
            ->add('fax', TextType::class)
            ->add('bp', TextType::class)
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
          array(
              'data_class' => 'BackendBundle\Entity\Pharmacie',
          )
        );
    }
}