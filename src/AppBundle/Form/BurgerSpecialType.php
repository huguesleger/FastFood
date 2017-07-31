<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BurgerSpecialType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $date = date('Y-m-d');
        $builder->add('name',null, array('label'=>'nom','attr'=> array(
                      'placeholder' => 'entrer le nom de votre burger ...')))
                ->add('description',null, array('attr'=> array(
                      'placeholder' => 'décrivez en quelques lignes votre burger ...')))
                 ->add('ingredient', TextType::class, array('label'=>'ingrédient(s)','attr'=>array('class'=>'tags')))
                ->add('dateDebut', DateType::class, array(
                    'widget' => 'single_text',
                     'html5' => false, 
                   'attr'=>array('placeholder'=>$date ,'class'=>'has-feedback-left')))
                ->add('datefin', DateType::class, array(
                    'widget' => 'single_text',
                     'html5' => false,
                   'attr'=>array('placeholder'=>$date ,'class'=>'has-feedback-left')))
                ->add('prix', MoneyType::class, array('attr' => array(
                    'placeholder' => "00.00")))
                ->add('image')
                ->add('publier', null, array ('attr'=> array(
                    'class' => 'js-switch'
                    )));
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
