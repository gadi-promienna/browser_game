<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlaceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array('label' => 'Nazwa'))
        ->add('hepiness', 'integer',  array('label' => 'Przyrost radości'))
        ->add('strength', 'integer', array('label' => 'Przyrost siły'))
        ->add('energy', 'integer', array('label' => 'Zmiana energii'))
        ->add('width', 'integer', array('label' => 'Zmiana szerokości'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Place'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_place';
    }


}
