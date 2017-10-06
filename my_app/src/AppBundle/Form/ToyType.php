<?php
/**
 * Toy type.
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ToyType.
 *
 * @package AppBundle\Form
 */

class ToyType extends AbstractType
{
    /**
     * {@inheritdoc}
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array('translation_domain' => 'translations/AppBundle.pl.yml', 'label'=>'Nazwa'))
            ->add('hapiness', 'integer',  array('label'=>'Zmiana radości' ))
            ->add('intelligence', 'integer', array('label'=>'Zmiana inteligencji' ));
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
            'data_class' => 'AppBundle\Entity\Toy'
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_toy';
    }


}
