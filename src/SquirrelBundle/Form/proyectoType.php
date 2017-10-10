<?php

namespace SquirrelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class proyectoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombreProyecto')->add('temaProyecto')->add('justificacionProyecto')->add('resultadosEsperados')->add('presupuesto')->add('idEstadoProyecto')->add('idCategoriaProyecto');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SquirrelBundle\Entity\proyecto'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'squirrelbundle_proyecto';
    }


}
