<?php

namespace App\Service;

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
}
