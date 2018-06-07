<?php

namespace Admin\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('pFNom')
            ->add('pFPrenom')
            ->add('pFDateEmb','date', array(
        // renders it as a single text box
        'widget' => 'single_text',
    ))
            ->add('pFDateSortie','date', array(
        // renders it as a single text box
        'widget' => 'single_text',
    ))
            ->add('pFTel')            
            ->add('pFCommentaire')
            ->add('pFOrantOption')
            ->add('pFEtat')
            ->add('diplome', 'entity', array(
    'class' => 'AdminTestBundle:Diplome',
    'property' => 'pHDiplomeLib',
));
            

    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'app_user_registration';
    }

    /**
     * Configures the options for this type.
     *
     * @param OptionsResolver $resolver The resolver for the options
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        // TODO: Implement configureOptions() method.
    }

    /**
     * Returns the prefix of the template block name for this type.
     *
     * The block prefix defaults to the underscored short class name with
     * the "Type" suffix removed (e.g. "UserProfileType" => "user_profile").
     *
     * @return string The prefix of the template block name
     */
    public function getBlockPrefix()
    {
        // TODO: Implement getBlockPrefix() method.
    }
}