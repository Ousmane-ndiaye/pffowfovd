<?php

namespace App\Service;

class Inscription
{
    public function getProfilChoisi($data)
    {
        switch ($data[self::PROFIL]) {
            case 'entreprise':
                $path = 'choisir_plan';
                $params = [];
                break;

            case 'professionnel':
                $path = 'creation_compte';
                $params = [self::PROFIL => $data[self::PROFIL]];
                break;

            default:
                $path = 'choisir_profil';
                $params = [];
                $this->addFlash(self::DANGER, 'Veillez choisir un profil.');
                break;
        }

        return [$path, $params];
    }
}
