<?php

namespace Logan\UserBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType {

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('username', 'text', array('attr' => array('class' => 'form-control')));
		$builder->add('plainPassword', 'repeated', array(
			'first_name'  	=> 'password',
			'second_name' 	=> 'confirm',
			'first_options'  => array('label' => 'Password', 'attr' => array('class' => 'form-control')),
			'second_options' => array('label' => 'Repeat Password','attr' => array('class' => 'form-control')),
			'type'        	=> 'password',
			'attr' => array('class' => 'form-control')
		));
		$builder->add('Register', 'submit', array('attr' => array('class' => 'btn btn-success')));
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'Logan\UserBundle\Entity\User'
		));
	}

	public function getName()
	{
		return 'user';
	}
} 