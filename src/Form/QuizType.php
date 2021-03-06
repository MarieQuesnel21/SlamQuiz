<?php

namespace App\Form;

use App\Entity\Quiz;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuizType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

                $builder
                ->add('title')
                ->add('summary')
                ->add('number_of_questions')
                ->add('active')
                ->add('created_at')
                ->add('updated_at')
                ->add('show_result_question')
                ->add('show_result_quiz')
                ->add('allow_anonymous_workout')
                ->add('result_quiz_comment')
                ->add('start_quiz_comment')
                ->add('category_quiz')
            ;
         



    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Quiz::class,
            'form_type' => 'student',
        ]);
    }
}
