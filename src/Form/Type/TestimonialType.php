<?php

declare(strict_types=1);

namespace Softylines\SyliusTestimonialPlugin\Form\Type;

use Softylines\SyliusTestimonialPlugin\Entity\Testimonial;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File as FileConstraint;

final class TestimonialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'softylines_sylius_testimonial.ui.name',
                'required' => true,
            ])
            ->add('content', TextareaType::class, [
                'label' => 'softylines_sylius_testimonial.ui.content',
                'required' => true,
            ])
            ->add('avatarFile', FileType::class, [
                'label' => 'softylines_sylius_testimonial.ui.avatar',
                'required' => false,
                'constraints' => [
                    new FileConstraint([
                        'maxSize' => '2M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'softylines_sylius_testimonial.ui.avatar_validation',
                    ]),
                ],
            ])
            ->add('enabled', CheckboxType::class, [
                'label' => 'softylines_sylius_testimonial.ui.enabled',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Testimonial::class,
        ]);
    }
}
