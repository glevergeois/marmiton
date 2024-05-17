<?php

namespace App\Form;

use App\Entity\Comment;
use App\Entity\Ingredient;
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
<<<<<<< HEAD
            ->add('email')
=======
            ->add('username')
>>>>>>> 6a83a4e46dbada869942af88a2d40d461bc46bf9
            ->add('password')
            ->add('name')
            // ->add('favourite')
            // ->add('comment', EntityType::class, [
            //     'class' => Comment::class,
            //     'choice_label' => 'id',
            // ])
            // ->add('ingredients', EntityType::class, [
            //     'class' => Ingredient::class,
            //     'choice_label' => 'id',
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
