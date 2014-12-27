<?php

namespace Logan\ClimbingPartnerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserdataType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ort', 'text', array('attr' => array('class' => 'form-control')))
            ->add('plz', 'text', array('attr' => array('class' => 'form-control')))
            ->add('geschlecht', 'choice', array(
				'choices'   => array('W' => 'weiblich', 'M' => 'männlich'),
				'attr' => array('class' => 'form-control')
			))
            ->add('email', 'text', array('attr' => array('class' => 'form-control')))
            ->add('text', 'text', array('attr' => array('class' => 'form-control')))
//            ->add('tag1', 'text', array('attr' => array('class' => 'form-control')))
//            ->add('tag2', 'text', array('attr' => array('class' => 'form-control')))
//            ->add('tag3', 'text', array('attr' => array('class' => 'form-control')))
//            ->add('tag4', 'text', array('attr' => array('class' => 'form-control')))
//            ->add('tag5', 'text', array('attr' => array('class' => 'form-control')))
//            ->add('tag6', 'text', array('attr' => array('class' => 'form-control')))
//            ->add('tag7', 'text', array('attr' => array('class' => 'form-control')))
            ->add('gradBis', 'text', array('attr' => array('class' => 'form-control')))
            ->add('vorstieg', 'choice', array(
				'choices'   => array('N' => 'Nein', 'J' => 'Ja'),
				'attr' => array('class' => 'form-control')
			))
			->add('seilVorhanden', 'choice', array(
				'choices'   => array('N' => 'Nein', 'J' => 'Ja'),
				'attr' => array('class' => 'form-control')
			))
			->add('Speichern', 'submit', array('attr' => array('class' => 'btn btn-success')))
			->add('Abbrechen', 'submit', array('attr' => array('class' => 'btn btn-danger')));
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Logan\ClimbingPartnerBundle\Entity\Userdata'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'logan_climbingpartnerbundle_userdata';
    }
}
