<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Validator\Constraints\LessThan;
use Symfony\Component\Validator\Constraints\GreaterThan;

class ResgisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('userName', TextType::class)
             ->add('Age', TextType::class, ['required' => false,
                        'constraints'=> [new LessThan([
                        'value' => 100]),
                         new GreaterThan([
                         'value' => 1
                        ])]
                         ])
            ->add('Adress', TextType::class,  ['required' => false], ['attr' => ['maxlength' => 255]], ['label' => 'Addresse'])
           
            ->add('Email')
            ->add('Password', RepeatedType::class,['type'=>PasswordType ::class,'first_options'  => ['label' => 'Password'],
            'second_options' => ['label' => 'Repeat password'],'required' => true,'attr' => [
                'placeholder' => 'example@site.com'
            ], 'mapped' => false, 'constraints' => [
                new NotBlank([
                    'message' => 'Please enter a password',
                ]),
                new Length([
                    'min' => 6,
                    'minMessage' => 'Your password should be at least {{ limit }} characters',
                    // max length allowed by Symfony for security reasons
                    'max' => 4096,
                ]),]])
           
            ->add('save', SubmitType::class, ['label' => 'Create user']); 
                
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
