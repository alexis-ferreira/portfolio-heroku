<?php

namespace App\Form;

use App\Entity\Website;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WebsiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('website_title', TextType::class, [
                "label" => false,
                "attr" => [
                    "class" => "col-md-6 mb-4 p-2 fs-5 fw-light"
                ]
            ])
            ->add('picture', FileType::class, [
                "label" => false,
                "attr" => [
                    "class" => "col-md-6 mb-4 border fs-5 fw-light"
                ]
            ])
            ->add('thumbnail', FileType::class, [
                "label" => false,
                "attr" => [
                    "class" => "col-md-6 mb-4 border fs-5 fw-light"
                ]
            ])
            ->add('description', TextareaType::class, [
                "label" => false,
                "attr" => [
                    "class" => "col-md-6 mb-4 p-2 fs-5 fw-light"
                ]
            ])
            ->add('url', TextType::class, [
                "label" => false,
                "attr" => [
                    "class" => "col-md-6 mb-4 p-2 fs-5 fw-light",
                    "placeholder" => "https://xxxx.xx"
                ]
            ])
            ->add('Ajouter', SubmitType::class, [
                "attr" => [
                    "class" => "btn btn-primary fs-5"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Website::class,
        ]);
    }
}
