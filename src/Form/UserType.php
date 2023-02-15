<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\School;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('credentials', RegistrationFormType::class)
            ->add('name')
            ->add('surname')
            ->add('phone')
            ->add('email')
            ->add('school', EntityType::class, [
                "class"=>School::class,
                "choice_label"=>'name'
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}