<?php

namespace App\Form;

use App\Entity\Citoyen;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CitoyenFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('numTel',TextType::class,[
                                            'label' => 'Numéro de Télephone'
                                            ])
            ->add('adresse')
            ->add('nbHommeAdulte')
            ->add('couffin')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Citoyen::class,
        ]);
    }
}
