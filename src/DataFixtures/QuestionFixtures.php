<?php

namespace App\DataFixtures;

use App\Entity\Question;
use App\Entity\Answer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class QuestionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $question = new question();
        $question->setText('Quelle est le fruit de Newton ?');
        $manager->persist($question);

        $answer = new answer();
        $answer->setText('pomme');
        $answer->setCorrect(true);
        $answer->setQuestion($question);
        $manager->persist($answer);

        $answer = new answer();
        $answer->setText('poire');
        $answer->setCorrect(false);
        $answer->setQuestion($question);
        $manager->persist($answer);

        $manager->persist($question);
        $manager->persist($answer);
        $manager->flush();
    }
}
