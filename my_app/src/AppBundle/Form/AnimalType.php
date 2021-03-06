<?php
/**
 * Animal type.
 */

namespace AppBundle\Form;

use AppBundle\Entity\Animal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class AnimalType.
 *
 * @package AppBundle\Form
 */

class AnimalType extends AbstractType
{
    /**
     * {@inheritdoc}
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => 'Imię'))
            ->add('password', 'password', array('label' => 'Hasło'))
        // ->add('color', 'text', array('label' => 'kolor'))
            ->add(
                'color', 'choice', array( 'label' => 'Kolor', 'multiple'=>false,
                'choices'=>array('red'=>'red', 
                  'black' =>'black',    
                'silver' =>'silver',
                 'gray'  =>'gray',     
                'white'  =>'white',     
                'maroon'  =>'maroon',   
                'purple' =>'purple',  
                'fuchsia' =>'fuchsia',  
                'green'   =>'green',    
                'lime'  =>'lime',   
                'olive' =>'olive',   
                'yellow'  =>'yellow',  
                'navy'  =>'navy',      
                'blue'  =>'blue',  
                'teal'   =>'teal',      
                'aqua'  =>  'aqua' ),
                'attr'=>array('style'=>'width:300px', 'customattr'=>'customdata')
                )
            )
            ->add('age', 'integer', array('label' => 'Wiek',  'attr' => array('min' => 1)))
            ->add('width', 'integer', array('label' => 'Szerokość',  'attr' => array('min' => 1)))
            ->add('height', 'integer', array('label' => 'Wysokość', 'attr' => array('min' => 1)));
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
            'data_class' => 'AppBundle\Entity\Animal'
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_animal';
    }


}
