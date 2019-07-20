<?php

namespace App\Service;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Security\Core\Security;
use Doctrine\ORM\EntityManagerInterface;
use Mgilet\NotificationBundle\Manager\NotificationManager;
use App\Entity\Experience;
use App\Entity\Formation;
use App\Entity\Langue;
use App\Entity\Vue;
use function GuzzleHttp\json_encode;

class Professionnel
{
    const FORM = 'form';
    const ENTITY = 'entity';

    private $entityManager;
    private $formFactory;
    private $currentUser;

    public function __construct(EntityManagerInterface $em, FormFactoryInterface $fFactory, Security $secur, NotificationManager $manager)
    {
        $this->entityManager = $em;
        $this->formFactory = $fFactory;
        $this->notifManager = $manager;
        $this->currentUser = $secur->getToken()->getUser();
    }

    public function listenSubmitedForm($forms, $request)
    {
        $formIsSubmitied = false;
        foreach ($forms as $form) {
            $form[self::FORM]->handleRequest($request);
            if ($form[self::FORM]->isSubmitted() && $form[self::FORM]->isValid()) {
                $form[self::ENTITY]->setUser($this->currentUser);
                $this->entityManager->persist($form[self::ENTITY]);
                $this->entityManager->flush();
                $formIsSubmitied = true;
            }
        }
        return $formIsSubmitied;
    }

    public function getRequiredForm($class, $id)
    {
        $classForm = '';

        switch ($class) {
            case 'experience':
                $entity = $this->entityManager->getRepository(Experience::class)->find($id);
                if ($entity) {
                    $classForm = 'Experience';
                }
                break;

            case 'formation':
                $entity = $this->entityManager->getRepository(Formation::class)->find($id);
                if ($entity) {
                    $classForm = 'Formation';
                }
                break;

            case 'langue':
                $entity = $this->entityManager->getRepository(Langue::class)->find($id);
                if ($entity) {
                    $classForm = 'Langue';
                }
                break;

            default:
                # code...
                break;
        }

        if ($classForm != '') {
            return [[self::FORM => $this->formFactory->create('App\Form\\' . $classForm . 'Type'::class, $entity), self::ENTITY => $entity]];
        }

        return false;
    }

    public function updateGeneralInfo()
    {
        if ($this->currentUser->getBirthday() != '') {
            list($jrD, $moisD, $anneeD) = explode('/', $this->currentUser->getBirthday());
            $this->currentUser->setBirthday(new \DateTime($anneeD . '/' . $moisD . '/' . $jrD . '00:00'));
        }
        $newSecteurs = $this->currentUser->getUserSecteurs()->last()->toArray();
        $this->currentUser->getUserSecteurs()->clear();
        $this->entityManager->persist($this->currentUser);
        $this->currentUser->updateSecteurs($newSecteurs);
        $this->entityManager->flush();
    }

    public function addNewVue($user)
    {
        $vueRepo = $this->entityManager->getRepository(Vue::class)->ifIsVisitedToday($user->getInfoProfil(), $this->currentUser);

        if (!$vueRepo) {
            $vue = new Vue();
            $vue->setDateVue(new \Datetime('now'))->setVisiteur($this->currentUser)->setInfoProfil($user->getInfoProfil());
            $this->entityManager->persist($vue);
            $this->entityManager->flush();

            $notif = $this->notifManager->createNotification('vu');
            $data = [
                'user' => $this->currentUser->getId(),
                'image' => $this->currentUser->getImage() ? $this->currentUser->getImage() : 'default.png',
                'fullname' => $this->currentUser->getPrenom() . ' ' . $this->currentUser->getNom()
            ];
            $notif->setMessage(json_encode($data));

            if (in_array('ROLE_ENTREPRISE', $this->currentUser->getRoles(), true)) {
                $notif->setLink('entreprise_profil');
            } elseif (in_array('ROLE_PROFESSIONNEL', $this->currentUser->getRoles(), true)) {
                $notif->setLink('professionnel_profil');
            }
            $this->notifManager->addNotification([$user], $notif, true);
        }
    }
}
