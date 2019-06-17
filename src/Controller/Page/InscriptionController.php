<?php

namespace App\Controller\Page;

use App\Service\Inscription;
use App\Controller\BaseController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * @Route("/inscription")
 */
class InscriptionController extends BaseController
{
    const ACTIVE_ROUTE = 'activeRoute';

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
        return $this->render('pages/front/inscription/choisir-profil.html.twig', [
            self::FORM => $form->createView(),
        ]);
    }

    /**
     * @Route("/choisir-plan", name="choisir_plan")
     */
    public function choisirPlan(Request $request)
    {
        return $this->render('pages/front/inscription/choisir-plan.html.twig', [
            self::PROFIL => 'entreprise',
            self::ACTIVE_ROUTE => 'plan'
        ]);
    }

    /**
     * @Route("/creation-compte/{profil}", name="creation_compte")
     */
    public function creationCompte($profil, Request $request)
    {
        return $this->render('pages/front/inscription/creation-compte.html.twig', [
            self::PROFIL => $profil,
            self::ACTIVE_ROUTE => 'compte'
        ]);
    }

    /**
     * @Route("/paiement-plan/{profil}", name="paiement_plan")
     */
    public function paiementPlan($profil, Request $request)
    {
        return $this->render('pages/front/inscription/paiement-plan.html.twig', [
            self::PROFIL => $profil,
            self::ACTIVE_ROUTE => 'paiement'
        ]);
    }
}
