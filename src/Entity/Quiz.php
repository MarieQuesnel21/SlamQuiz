<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuizRepository")
 */
class Quiz
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", inversedBy="quizzes")
     */
    private $category_quiz;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $summary;

    /**
     * @ORM\Column(type="integer")
     */
    private $number_of_questions;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="boolean")
     */
    private $show_result_question;

    /**
     * @ORM\Column(type="boolean")
     */
    private $show_result_quiz;

    /**
     * @ORM\Column(type="boolean")
     */
    private $allow_anonymous_workout;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $result_quiz_comment;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $start_quiz_comment;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Workout", mappedBy="quiz", cascade={"persist", "remove"})
     */
    private $workouts;


    public function __construct()
    {
        $this->category_quiz = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategoryQuiz(): Collection
    {
        return $this->category_quiz;
    }

    public function addCategoryQuiz(Category $categoryQuiz): self
    {
        if (!$this->category_quiz->contains($categoryQuiz)) {
            $this->category_quiz[] = $categoryQuiz;
        }

        return $this;
    }

    public function removeCategoryQuiz(Category $categoryQuiz): self
    {
        if ($this->category_quiz->contains($categoryQuiz)) {
            $this->category_quiz->removeElement($categoryQuiz);
        }

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(?string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getNumberOfQuestions(): ?int
    {
        return $this->number_of_questions;
    }

    public function setNumberOfQuestions(int $number_of_questions): self
    {
        $this->number_of_questions = $number_of_questions;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getShowResultQuestion(): ?bool
    {
        return $this->show_result_question;
    }

    public function setShowResultQuestion(bool $show_result_question): self
    {
        $this->show_result_question = $show_result_question;

        return $this;
    }

    public function getShowResultQuiz(): ?bool
    {
        return $this->show_result_quiz;
    }

    public function setShowResultQuiz(bool $show_result_quiz): self
    {
        $this->show_result_quiz = $show_result_quiz;

        return $this;
    }

    public function getAllowAnonymousWorkout(): ?bool
    {
        return $this->allow_anonymous_workout;
    }

    public function setAllowAnonymousWorkout(bool $allow_anonymous_workout): self
    {
        $this->allow_anonymous_workout = $allow_anonymous_workout;

        return $this;
    }

    public function getResultQuizComment(): ?string
    {
        return $this->result_quiz_comment;
    }

    public function setResultQuizComment(?string $result_quiz_comment): self
    {
        $this->result_quiz_comment = $result_quiz_comment;

        return $this;
    }

    public function getStartQuizComment(): ?string
    {
        return $this->start_quiz_comment;
    }

    public function setStartQuizComment(?string $start_quiz_comment): self
    {
        $this->start_quiz_comment = $start_quiz_comment;

        return $this;
    }

    public function getWorkouts(): ?Workout
    {
        return $this->workouts;
    }

    public function setWorkouts(Workout $workouts): self
    {
        $this->workouts = $workouts;

        // set the owning side of the relation if necessary
        if ($this !== $workouts->getQuiz()) {
            $workouts->setQuiz($this);
        }

        return $this;
    }

   
}
