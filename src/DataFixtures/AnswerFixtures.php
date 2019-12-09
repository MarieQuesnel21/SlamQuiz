<?php

namespace App\DataFixtures;

use App\Entity\Answer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AnswerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $answer = new answer();
        $answer->setText('pomme');
        $answer->setCorrect(true);
        $manager->persist($answer);

        $answer = new answer();
        $answer->setText('poire');
        $answer->setCorrect(false);
        $manager->persist($answer);

        $manager->flush();
    }
}
