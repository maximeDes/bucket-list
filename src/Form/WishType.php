<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Wish;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WishType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Souhait: '
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description: ',
                'required' => false,
            ])
            ->add('author', TextType::class, [
                'label' => 'Auteur: ',
            ])
            ->add('categorie', EntityType::class, [
                'label' => 'Category',
            // quelle est la classe à afficher ici ?
                'class' => Categorie::class,
            // quelle propriété utiliser pour les <option> dans la liste déroulante ?
                'choice_label' => 'name'
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Wish::class,
        ]);
    }
}
