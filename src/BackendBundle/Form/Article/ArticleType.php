<?php

namespace BackendBundle\Form\Article;

use BackendBundle\Form\ClasseTherapeutique\ClasseTherapeutiqueType;
use BackendBundle\Form\ImageArticle\ImageArticleType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormEvents;

class ArticleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('libelle', TextType::class)
                ->add('principeActif', TextType::class)
                ->add('excipient', TextareaType::class)
                ->add('modeAdministration', TextType::class)
                ->add('possologie', TextareaType::class)
                ->add('aspect', TextType::class)
                ->add('limiteCommande', TextType::class)
                ->add('classetherapeutique', EntityType::class,array(
                    'class'=>'BackendBundle:ClasseTherapeutique',
                    'choice_label'=>'libelle',))
                ->add('image', ImageArticleType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackendBundle\Entity\Article'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'backendbundle_article';
    }


}
