<?php

namespace App\Form;

use App\Entity\Inscription;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type as SFType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('statut', ChoiceType::class, [
                'choices' => [
                    'Autorise' => 'A',
                    'En attente' => 'E',
                    'Refuse' => 'R',
                ]
            ])
            ->add('employe', EntityType::class, array(
                'class' => 'App\Entity\Employe',
                'choice_label' => 'prenom',
            ))
            ->add('formation', EntityType::class, array(
                'class' => 'App\Entity\Formation',
                'choice_label' => 'id',
            ))
            ->add('save', SFType\SubmitType::class);;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Inscription::class,
        ]);
    }
}
