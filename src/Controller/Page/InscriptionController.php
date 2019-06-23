<?php

namespace App\Controller\Page;

use App\Service\Inscription;
use App\Controller\BaseController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\User;
use App\Form\UserRegisterType;

/**
 * @Route("/inscription")
 */
class InscriptionController extends BaseController
{
    const ACTIVE_ROUTE = 'activeRoute';
    const PAGE_FRONT = 'pages/front/inscription';
    const VALIDE_PROFILS = ['professionnel', 'entreprise'];

    /**
     * @Route("/choisir-profil", name="choisir_profil")
     */
    public function choisirProfil(Request $request, Inscription $inscription)
    {
        $form = $this->createFormBuilder()
            ->add('profil', HiddenType::class)
            ->add('save', SubmitType::class, ['label' => 'Valider'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $params = $inscription->getProfilChoisi($form->getData());

            return $this->redirectToRoute($params[0], $params[1]);
        }
        return $this->render(self::PAGE_FRONT . '/choisir-profil.html.twig', [
            self::FORM => $form->createView(),
        ]);
    }

    /**
     * @Route("/choisir-plan", name="choisir_plan")
     */
    public function choisirPlan(Request $request)
    {
        return $this->render(self::PAGE_FRONT . '/choisir-plan.html.twig', [
            self::PROFIL => 'entreprise',
            self::ACTIVE_ROUTE => 'plan'
        ]);
    }

    /**
     * @Route("/creation-compte/{profil}", name="creation_compte")
     */
    public function creationCompte($profil, Request $request, Inscription $inscription)
    {
        $user = new User();
        $form = $this->createForm(UserRegisterType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() && in_array($profil, self::VALIDE_PROFILS)) {
            if (!$this->userRepository->findOneBy([self::EMAIL => $user->getEmail()])) {
                $inscription->setNewUser($user, $profil, $this->passwordEncoder);
                $this->entityManager->persist($user);
                $this->entityManager->flush();
                $this->addFlash(self::SUCCESS, 'Votre inscription a été pris en compte, un email de confirmation vous a été envoyer!');
                return $this->redirectToRoute('paiement_plan', [self::PROFIL => $profil]);
            }
            $this->addFlash(self::DANGER, 'Un compte avec cette adresse email existe déjà.');
        }

        return $this->render(self::PAGE_FRONT . '/creation-compte.html.twig', [
            self::PROFIL => $profil,
            self::ACTIVE_ROUTE => 'compte',
            self::FORM => $form->createView()
        ]);
    }

    /**
     * @Route("/paiement-plan/{profil}", name="paiement_plan")
     */
    public function paiementPlan($profil, Request $request)
    {
        return $this->render(self::PAGE_FRONT . '/paiement-plan.html.twig', [
            self::PROFIL => $profil,
            self::ACTIVE_ROUTE => 'paiement'
        ]);
    }
}
