<?php
/**
 * Form Type
 *
 * Demo form
 *
 * @author Etch Akhtar
 * @version 1.0
 * @since 23rd Jul 2016
 * @copyright Copyright (c) 2016, Etch Akhtar
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Form Type Class
 *
 * Demo form
 *
 * @author Etch Akhtar
 * @version 1.0
 * @since 23rd Jul 2016
 * @copyright Copyright (c) 2016, Etch Akhtar
 */
class DemoPersonForm extends AbstractType
{
	public function __construct()
	{
	}

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['required'=>true, 'label_attr' => ['class' => 'control-label col-sm-3']])
            ->add('age', TextType::class, ['required'=>true, 'label_attr' => ['class' => 'control-label col-sm-3']])
        ;
    }
}
