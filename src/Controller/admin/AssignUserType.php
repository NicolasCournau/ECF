<?php

namespace App\Controller\admin;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\NotBlank;

class AssignUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', ChoiceType::class, [
                'choices' => [
                    'Nicolas Cournau' => 'Nicolas Cournau',
                    'Sebastien Cournau' => 'Sebastien Cournau',
                    'Charles Briffault' => 'Charles Briffault',
                    'Frédéric Guillou' => 'Frédéric Guillou',
                    'Julien Guillemet' => 'Julien Guillemet'
                ],
                'label' => 'Nom du franchisé'
            ])
            ->add('permissions', CollectionType::class, [
                'entry_type' => AssignFormType::class,
                'by_reference' => false,
                'allow_add' => true,
                //'allow delete' => true,
                //'error_bubbling' => false
            ])
            ->add('valider', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' => User::class,
        ]);
    }
}
