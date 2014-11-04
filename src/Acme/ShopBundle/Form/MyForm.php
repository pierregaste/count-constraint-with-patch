<?php

namespace Acme\ShopBundle\Form;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\NotBlank;

class MyForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'products',
            'entity',
            array(
                'class'         => 'AcmeShopBundle:Product',
                'expanded'      => true,
                'multiple'      => true,
                'constraints'   => array(
                    // I tried with or without the NotBlank constraint
                    new NotBlank(),
                    // Everything work fine if I set min to 2 or more
                    new Count(array('min' => 1))
                )
            )
        );

        // I tried with or without other field
//         $builder->add('foo', 'text');

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        // I tried with or without data initialization
//         $resolver->setDefaults(array('data' => array('products' => new ArrayCollection())));
    }

    public function getName()
    {
        return 'my_form';
    }

}