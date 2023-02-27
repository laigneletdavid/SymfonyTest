<?php

namespace App\Form;

use App\Entity\Pet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, ['label' => 'Nom de l\'animal'])
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'cat' => 'chat',
                    'dog' => 'chien',
                    'rabbit' => 'lapin'
                ]
            ], ['label' => 'Type d\'animal'])
            ->add('weight', null, ['label' => 'Poids de l\'animal'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pet::class,
            'method' => 'GET', // Idéal pour un formulaire de recherche on récupère la recherche dans le GET
            'invalid_message' => 'Erreur dans le formulaire'

        ]);
    }
}
