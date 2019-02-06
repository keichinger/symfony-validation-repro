<?php declare(strict_types=1);

namespace App\Form;

use App\Entity\EntityB;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntityBForm extends AbstractType
{
    public function buildForm (FormBuilderInterface $builder, array $options) : void
    {
        parent::buildForm($builder, $options);

        $builder
            ->add("fieldA", null, [
                "label" => "Field A",
            ])
            ->add("fieldB", null, [
                "label" => "Field B",
            ]);
    }

    public function configureOptions (OptionsResolver $resolver) : void
    {
        parent::configureOptions($resolver);

        $resolver
            ->setDefined(["enable_a", "enable_b"])
            ->setAllowedTypes("enable_a", "bool")
            ->setAllowedTypes("enable_b", "bool")
            ->setDefaults([
                "data_class" => EntityB::class,
                "enable_a" => true,
                "enable_b" => true,
                "validation_groups" => function (FormInterface $form)
                {
                    $groups = ["Default"];
                    $options = $form->getConfig()->getOptions();

                    if ($options["required"])
                    {
                        $groups[] = "required";
                    }

                    if ($options["enable_a"])
                    {
                        $groups[] = "required_field_a";
                    }

                    if ($options["enable_b"])
                    {
                        $groups[] = "required_field_b";
                    }

                    dump("EntityBForm Groups:", $groups);

                    return $groups;
                },
            ]);
    }
}
