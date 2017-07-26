<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BurgerSpecialType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $d = date('yyyy-mm-d');
        $builder->add('name')
                ->add('description')
                 ->add('ingredient', CollectionType::class, array(
                      'entry_type'   => IngredientType::class,
                      'allow_add'    => true,
                      'allow_delete' => true))
                ->add('dateDebut', DateType::class, array(
                    'widget' => 'single_text',
                     'html5' => false,
                   'attr'=>array('class'=>'has-feedback-left')))
                ->add('datefin', DateType::class, array(
                    'widget' => 'single_text',
                     'html5' => false,
                   'attr'=>array('class'=>'has-feedback-left')))
                ->add('prix')
                ->add('image')
                ->add('publier');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\BurgerSpecial'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_burgerspecial';
    }


}
