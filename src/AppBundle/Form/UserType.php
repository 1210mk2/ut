<?php
/**
 * Created by PhpStorm.
 * User: grin
 * Date: 13.05.2018
 * Time: 15:04
 */

namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('email', TextType::class)
            ->add('city', TextType::class)
            ->add('country', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Зарегистрировать'))
        ;
    }
}