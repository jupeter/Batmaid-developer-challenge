<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\AgentDecline;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class AgentDeclineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reason', ChoiceType::class, array(
                'choices' => array(
                    'I have a conflicting appointment' => AgentDecline::REASON_CONFLICT,
                    'The travel time is too long' => AgentDecline::REASON_TRAVEL,
                    'Other' => AgentDecline::REASON_OTHER,
                ),
                'expanded' => true,
            ))
            ->add('notice', TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Enter other reason',
                ),
                'required' => false,
            ))
            ->add('submit', SubmitType::class)
        ;
    }
}
