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
use App\Entity\Plan;
use App\Entity\Entreprise;
use App\Form\EntrepriseRegisterType;
use App\Entity\Personnes;

/**
 * @Route("/inscription")
 */
class InscriptionController extends BaseController
{
    const ACTIVE_ROUTE = 'activeRoute';
    const PAGE_FRONT = 'pages/front/inscription';
    const VALIDE_PROFILS = ['professionnel', self::ENTREPRISE];

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
            self::PROFIL => self::ENTREPRISE,
            'plans' => $this->entityManager->getRepository(Plan::class)->findAll(),
            self::ACTIVE_ROUTE => 'plan'
        ]);
    }

    /**
     * @Route("/creation-entreprise/{plan}", name="creation_entreprise")
     */
    public function creationEntreprise($plan, Request $request)
    {
        $plan = $this->entityManager->getRepository(Plan::class)->findOneBy(['libelle' => $plan]);
        if (!$plan) {
            return $this->redirectToRoute('choisir_plan');
        }
        $entreprise = new Entreprise();
        $form = $this->createForm(EntrepriseRegisterType::class, $entreprise);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entreprise->setPlan($plan)->setSlug($this->slugify($entreprise->getLibelle()));
            $this->entityManager->persist($entreprise);
            $this->entityManager->flush();
            $this->addFlash(self::SUCCESS, 'Votre entreprise a été enregistrer avec succès!');
            return $this->redirectToRoute('creation_compte', [self::PROFIL => self::VALIDE_PROFILS[1], self::SLUG => $entreprise->getSlug()]);
        }

        return $this->render(self::PAGE_FRONT . '/creation-entreprise.html.twig', [
            self::PROFIL => self::VALIDE_PROFILS[1],
            'plan' => $plan,
            self::FORM => $form->createView(),
            self::ACTIVE_ROUTE => self::ENTREPRISE
        ]);
    }

    /**
     * @Route("/creation-compte/{profil}/{registred}/{slug}", name="creation_compte")
     */
    public function creationCompte(Request $request, Inscription $inscription, $profil, $registred = 0, $slug = '')
    {
        $user = new User();
        $form = $this->createForm(UserRegisterType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() && in_array($profil, self::VALIDE_PROFILS)) {
            $this->entityManager->getConnection()->beginTransaction();
            try {
                $inscription->setNewUser($user, $profil, $this->passwordEncoder);
                $route = 'creation_compte';
                $params = [self::PROFIL => $profil, 'registred' => 1];
                $this->entityManager->persist($user);
                if ($profil == self::VALIDE_PROFILS[1] && $slug != '' && $request->get('poste')) {
                    $entreprise = $this->entityManager->getRepository(Entreprise::class)->findOneBy([self::SLUG => $slug]);
                    $user->setEntreprise($entreprise);
                    $this->entityManager->persist($user);
                    $personne = new Personnes();
                    $personne->setEntreprise($entreprise)->setUser($user)->setRoles(["ROLE_ADMINISTRATEUR"])->setPoste($request->get('poste'));
                    $this->entityManager->persist($personne);
                    $route = 'signup_welcome';
                    $params = [self::SLUG => $slug];
                }
                $this->entityManager->flush();
                $this->entityManager->getConnection()->commit();
            } catch (Exception $e) {
                $this->entityManager->getConnection()->rollBack();
                throw $e;
            }
            //$this->sendMailHelper->sendEmail(self::APP_EMAIL, $user->getEmail(), 'Bienvenue sur SUNU CVIDEO', $body);
            $this->addFlash(self::SUCCESS, 'Votre inscription a été pris en compte, un email de confirmation vous a été envoyer!');
            return $this->redirectToRoute($route, $params);
        }

        return $this->render(self::PAGE_FRONT . '/creation-compte.html.twig', [
            self::PROFIL => $profil,
            'registred' => $registred,
            self::ACTIVE_ROUTE => 'compte',
            self::FORM => $form->createView()
        ]);
    }

    /**
     * @Route("/signup-welcome/{slug}", name="signup_welcome")
     */
    public function signupWelcome($slug)
    {
        $entreprise = $this->entityManager->getRepository(Entreprise::class)->findOneBy([self::SLUG => $slug]);
        if (!$entreprise || count($entreprise->getPersonnes()) != 1) {
            return $this->redirectToRoute(self::HOME_PAGE);
        }

        return $this->render(self::PAGE_FRONT . '/signup-welcome.html.twig', [
            self::PROFIL => self::ENTREPRISE,
            self::ACTIVE_ROUTE => 'welcome',
            self::ENTREPRISE => $entreprise
        ]);
    }
}
