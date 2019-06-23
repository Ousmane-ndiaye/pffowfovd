<?php

namespace App\Tests\Service;

use App\Service\Inscription;
use PHPUnit\Framework\TestCase;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class InscriptionTest extends TestCase
{
    private $serviceTest;

    function setUp()
    {
        $this->serviceTest = new Inscription();
    }

    /**
     * @covers App\Service\Inscription::getProfilChoisi
     */
    public function testGetProfilChoisi()
    {
        $this->assertArraySubset(['choisir_plan', []], $this->serviceTest->getProfilChoisi(['profil' => 'entreprise']));
    }

    /**
     * @covers App\Service\Inscription::setNewUser
     */
    public function testsetNewUser()
    {
        $user = new User();
        $encoder = $this->getMockBuilder(UserPasswordEncoderInterface::class)->getMock();
        $user->setPrenom('Ousmane')->setNom('Ndiaye')->setEmail('ousmanendiaye352@gmail.com')->setPassword('passer1234');
        $this->serviceTest->setNewUser($user, 'professionnel', $encoder);
        $this->assertTrue(in_array('ROLE_PROFESSIONNEL', $user->getRoles()));
    }
}
