<?php

namespace App\Service;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class Inscription
{
    public function getProfilChoisi($data)
    {
        $profil = $data['profil'];
        switch ($profil) {
            case 'entreprise':
                $path = 'choisir_plan';
                $params = [];
                break;

            case 'professionnel':
                $path = 'creation_compte';
                $params = ['profil' => $profil];
                break;

            default:
                $path = 'choisir_profil';
                $params = [];
                $this->addFlash('danger', 'Veillez choisir un profil.');
                break;
        }
        return [$path, $params];
    }

    public function setNewUser(&$user, $profil, $encoder)
    {
        $user->setRoles($profil)->setIsActive(0)->setCreatedAt(new \DateTime(date('Y-m-d H:i:s')))->setPassword($encoder->encodePassword($user, $user->getPassword()));
    }
}
