<?php

namespace SquirrelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsuarioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nombreCompleto')
        // ->add('cargoInstitucional')
        ->add('username')
        ->add('password')
        ->add('email')
        // ->add('facultadPertenece')
        // ->add('idioma')
        // ->add('preparacionAcademica')
        // ->add('capacitacion')
        // ->add('publicacion')
        ->add('idRol',null, ['property'=>'nombreRol'])
        ->add('isActive', 'checkbox')
        // ->add('createdAt')
        // ->add('updatedAt')
        // ->add('ponencia')

        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SquirrelBundle\Entity\Usuario'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'squirrelbundle_usuario';
    }


}
