<?php

namespace App\Controller;

use App\Entity\Quiz;
use App\Entity\Answer;
use App\Form\QuizType;
use App\Entity\Workout;
use App\Entity\Category;
use App\Entity\Question;
use App\Form\QuestionType;
use App\Repository\QuizRepository;
use App\Repository\QuestionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
    public function quizuser_question(QuestionRepository $questionRepository, Category $category): Response
    {
        $question = $questionRepository->findOneRandomByCategories($category->getId());

        return $this->render('quizuser/question.html.twig', [
            'question' => $question,
        ]);
   
    }
  
}
