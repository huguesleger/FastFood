<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MenuType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class,array(
                      'attr'=> array(
                      'placeholder'=> 'Nom du menu'),'label'=>'Nom'))
                ->add('choix', ChoiceType::class, array(
                      'choices'=> array(
                      'Accompagnement ou boisson'=> 'Accompagnement ou boisson',
                      'Accompagnement + boisson'=>  'Accompagnement + boisson',
                      'Accompagnement + boisson + dessert' => 'Accompagnement + boisson + dessert',
                      'boisson + dessert' => 'boisson + dessert' 
                      ),'label'=>'Formule'))
                ->add('prix', MoneyType::class, array('label' => 'Prix',
                    'invalid_message' => 'La valeur n\'est pas un chiffre.',
                    'attr' => array(
                      'placeholder' => "00.00",
                      )));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Menu'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_menu';
    }


}
