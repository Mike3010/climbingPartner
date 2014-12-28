<?php

namespace Logan\MessageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MessageType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('subject', 'text', array('attr' => array('class' => 'form-control')))
            ->add('text', 'textarea', array('attr' => array('class' => 'form-control', 'rows' => '7')))
			->add('Send', 'submit', array('attr' => array('class' => 'btn btn-success')))
			->add('Cancel', 'submit', array('attr' => array('class' => 'btn btn-danger backLink')));
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Logan\MessageBundle\Entity\Message'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'logan_messagebundle_message';
    }
}
