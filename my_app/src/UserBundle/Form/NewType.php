<?php
/**
 * New user type.
 */

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;


/**
 * Class NewType.
 *
 * @package UserBundle\Form
 */
class NewType extends AbstractType
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
            ->add('username', 'text', array( 'label' => 'Nazwa użytkownika'))
            ->add('plainpassword', 'password', array( 'label' => 'Hasło'))
            ->add('email', 'text')
            ->add(
                'roles', 'choice', array( 'label' => 'Rola', 'multiple'=>true,
                'choices'=>array('ROLE_SUPER_ADMIN'=>'administrator',
                                'ROLE_USER'=>'użytkownik')
                )
            );
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
            'data_class' => 'UserBundle\Entity\User'
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'userbundle_user';
    }


}
