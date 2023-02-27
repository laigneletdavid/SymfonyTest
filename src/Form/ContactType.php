<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('message')
            // ATTENTION il n'y a pas d'Entity qui correspond donc j'ai un message d'erreur ! Il faudrait créer des liaisons entreles table ou juste un field pet
                // Iic c'est juste pour montrer que l'on peut intégrer un formulaire dans un formulaire.
            ->add('pets', CollectionType::class, [
                'entry_type' => PetType::class,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
