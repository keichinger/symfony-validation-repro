<?php declare(strict_types=1);

namespace App\Form;

use App\Entity\EntityA;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntityAForm extends AbstractType
{
    public function buildForm (FormBuilderInterface $builder, array $options) : void
    {
        parent::buildForm($builder, $options);

        $builder
            ->add("name", null, [
                "label" => "Name",
            ])
            ->add("entityB", EntityBForm::class, [
                "label" => "Entity B",
            ]);
    }

    public function configureOptions (OptionsResolver $resolver) : void
    {
        parent::configureOptions($resolver);

        $resolver
            ->setDefaults([
                "data_class" => EntityA::class,
            ]);
    }
}
