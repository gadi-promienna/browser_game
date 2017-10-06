<?php
/**
 * Place type.
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class PlaceType.
 *
 * @package AppBundle\Form
 */

class PlaceType extends AbstractType
{
    /**
     * {@inheritdoc}
     * @param FormBuilderInterface $builder
     * @param array $options
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
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
            'data_class' => 'AppBundle\Entity\Place'
            )
        );
    }

    /**
     * {@inheritdoc}
     *
     * @param OptionsResolver $resolver
     */
    public function getBlockPrefix()
    {
        return 'appbundle_place';
    }


}
