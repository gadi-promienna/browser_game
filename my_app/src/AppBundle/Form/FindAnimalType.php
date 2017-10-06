<?php
/**
 * Find animal type.
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class FindAnimalType.
 *
 * @package AppBundle\Form
 */
class FindAnimalType extends AbstractType
{
    /**
     * {@inheritdoc}
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array('label'=>"Imię"))->add('password', 'password', array('label'=>"Hasło"));
    }
}