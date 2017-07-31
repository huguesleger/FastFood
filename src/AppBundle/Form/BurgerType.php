<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BurgerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        
        $builder->add('name',null, array('label'=>'nom','attr'=> array(
                      'placeholder' => 'entrer le nom de votre burger ...')))
                ->add('description', TextType::class, array('attr'=> array(
                      'placeholder' => 'décrivez en quelques lignes votre burger ...')))
                ->add('ingredient', CollectionType::class, array(
                      'entry_type'   => IngredientType::class,
                      'allow_add'    => true,
                      'allow_delete' => true))
                ->add('price', MoneyType::class, array('label' => 'prix','attr' => array(
                    'placeholder' => "00.00")))
                ->add('categorie',null, array ('placeholder' => 'sans catégorie ...'))
                ->add('thumbnail', FileType::class, array('data_class' => null,'required' => false,'label'=> 'image'))
                ->add('publish', null, array ('label'=>'publier','attr'=> array(
                    'class' => 'js-switch'
                    )));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Burger'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_burger';
    }


}
