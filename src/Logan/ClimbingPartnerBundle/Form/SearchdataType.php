<?php

namespace Logan\ClimbingPartnerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SearchdataType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('ort', 'text', array('attr' => array('class' => 'form-control')))
			->add('plz', 'text', array('attr' => array('class' => 'form-control')))
			->add('geschlecht', 'choice', array(
				'choices' => array(null => 'egal', 'W' => 'weiblich', 'M' => 'männlich'),
				'attr' => array('class' => 'form-control')
			))
			->add('gradBis', 'text', array('attr' => array('class' => 'form-control')))
			->add('vorstieg', 'choice', array(
				'choices'   => array(null => 'egal', 'N' => 'Nein', 'J' => 'Ja'),
				'attr' => array('class' => 'form-control')
			))
			->add('seilVorhanden', 'choice', array(
				'choices'   => array(null => 'egal', 'N' => 'Nein', 'J' => 'Ja'),
				'attr' => array('class' => 'form-control')
			))
			->add('Suchen', 'submit', array('attr' => array('class' => 'btn btn-success')));
	}

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Logan\ClimbingPartnerBundle\Entity\Searchdata'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'logan_climbingpartnerbundle_searchdata';
    }
}
