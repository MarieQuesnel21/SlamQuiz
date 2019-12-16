<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\BrowserKit\Cookie;

class QuestionControllerTest extends WebTestCase
{ 
    private $client = null;

    private function logIn($userName = 'user', $userRole = 'ROLE_USER')
    {

    $session = $this->client->getContainer()->get('session');

    $firewallName = 'main';
    $firewallContext = 'main';

    $token = new UsernamePasswordToken($userName, null, $firewallName, [$userRole]);
    $session->set('_security_'.$firewallContext, serialize($token));
    $session->save();

    $cookie = new Cookie($session->getName(), $session->getId());
    $this->client->getCookieJar()->set($cookie);

    }


    public function setUp()
    {
        $this->client = static::createClient();
    }

     /**
     * Check the logged-on user's path access with the ROLE_USER role
     */
    public function testSecuredRoleUser()
    {
        $this->logIn('user', 'ROLE_USER');
        $crawler = $this->client->request('GET', '/question/');

        // Asserts that /question path exists and don't return an error
        /* 
        Ecrire ici le code pour vérifier que, si l'utilisateur est connecté avec le rôle ROLE_USER, 
        la requête '/question/new' affiche que l'accès est interdit
        c'est à dire affirmer que le code de statut de la réponse est égale à 403 (Response::HTTP_FORBIDDEN)
        */

        $this->assertEquals(403, $this->client->getResponse()->getStatusCode());
    }

    
}
