<?php
/**
 * Food type.
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class FoodType.
 *
 * @package AppBundle\Form
 */

class FoodType extends AbstractType
{
    /**
     * {@inheritdoc}
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'name', 'text', array('label' => 'Nazwa',
            'translation_domain' => 'AppBundle' )
        )
            ->add('energy', 'integer', array('label' => 'Zmiana energii'))
            ->add('height', 'integer', array('label' => 'Zmiana wysokości'))
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
            'data_class' => 'AppBundle\Entity\Food'
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_food';
    }


}
