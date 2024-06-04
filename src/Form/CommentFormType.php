<?php

namespace App\Form;

use App\Entity\Comment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;

class CommentFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('author', null, [
                'label' => 'Your name',
                'row_attr' => [
                    'class' => 'mb-3',
                ],
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Your name here',
                ],
            ])
            ->add('text', TextareaType::class, [
                'label' => 'Your comment',
                'row_attr' => [
                    'class' => 'mb-3',
                ],
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Your email',
                'row_attr' => [
                    'class' => 'mb-3',
                ],
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'name.firstname@example.com',
                ],
            ])
            ->add('photo', FileType::class, [
                'required' => false,
                'mapped' => false,
                'row_attr' => [
                    'class' => 'mb-3',
                ],
                'attr' => [
                    'class' => 'form-control form-control-sm',
                    'type' => 'file',
                ],
                'label' => 'Photo',
                'constraints' => [
                    new Image(['maxSize' => '1024k']),
                ],
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
