<?php

namespace App\Controller;

use App\Entity\Quiz;
use App\Entity\Workout;
use App\Form\QuizType;
use App\Repository\QuizRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class QuizuserController extends AbstractController
{
    /**
     * @Route("/quizuser", name="quizuser")
     */
    public function index(QuizRepository $quizRepository): Response
    {
        return $this->render('quizuser/index.html.twig', [
            'quizzes' => $quizRepository->findAllQuiz(),
        ]);
    }

     /**
     * @Route("/quizuser/{id}", name="quizuser_show", methods={"GET"})
     */
    public function show(Quiz $quiz): Response
    {
        return $this->render('quizuser/show.html.twig', [
            'quiz' => $quiz,
        ]);
    }

      /**
     * @Route("/quizuserquestion/{id}", name="quizuser_question", methods={"GET"})
     */
    public function quizuser_question(QuizRepository $quizRepository,Quiz $quiz): Response
    {
        return $this->render('question/index.html.twig', [
            'questions' => $questionRepository->findOneRandomByCategories(),
        ]);

              
        
    }
  
}
