<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{   private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
        $this->passwordEncoder = $passwordEncoder;
     }
     
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        

        $user = new User();
        $user->setEmail('user@gmail.com');
        $user->setRoles(['ROLE_USER']);
        $manager->persist($user);

        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
        'user'
        ));

        $user = new User();
        $user->setEmail('admin@gmail.com');
        $user->setRoles(['ROLE_ADMIN']);
 
        $manager->persist($user);

        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
        'admin'
        ));

        $user = new User();
        $user->setEmail('super_admin@gmail.com');
        $user->setRoles(['ROLE_SUPER_ADMIN']);
        $user->setPassword('super_user');
        $manager->persist($user);

        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
        'super_admin'
        ));
        $manager->flush();
    }
}
