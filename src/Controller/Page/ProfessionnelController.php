<?php

namespace App\Controller\Page;

use App\Controller\BaseController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use App\Form\InformationProfilType;
use App\Entity\Infoprofil;
use App\Form\ExperienceType;
use App\Entity\Experience;
use App\Entity\Formation;
use App\Form\FormationType;
use App\Form\LangueType;
use App\Entity\Langue;
use App\Entity\User;
use App\Service\Professionnel;
use App\Entity\Usersecteur;
use App\Entity\Vue;

/**
 * @Route("/professionnel")
 */
class ProfessionnelController extends BaseController
{
    const PROFESSIONNEL_PROFIL = 'professionnel_profil';
    const ENTITY = 'entity';

    /**
     * @Route("/dashboard", name="professionnel_dashboard")
     * @Security("is_granted('ROLE_PROFESSIONNEL')")
     */
    public function dashboard(Request $request)
    {
        return $this->render('pages/front/dashboard/professionnel.html.twig', []);
    }

    /**
     * @Route("/profil", name="professionnel_profil")
     * @Security("is_granted('ROLE_PROFESSIONNEL')")
     */
    public function profil(Request $request, Professionnel $professionnel)
    {
        $user = $this->getUser();
        $infoProfil = $user->getInfoProfil();
        $experience = new Experience();
        $formation = new Formation();
        $langue = new Langue();
        if (!$infoProfil) {
            $infoProfil = new Infoprofil();
        }
        $formInfoProfil = $this->createForm(InformationProfilType::class, $infoProfil);
        $formExperience = $this->createForm(ExperienceType::class, $experience);
        $formFormation = $this->createForm(FormationType::class, $formation);
        $formLangue = $this->createForm(LangueType::class, $langue);

        $forms = [[self::FORM => $formInfoProfil, self::ENTITY => $infoProfil], [self::FORM => $formExperience, self::ENTITY => $experience], [self::FORM => $formFormation, self::ENTITY => $formation], [self::FORM => $formLangue, self::ENTITY => $langue]];

        $formIsSubmited = $professionnel->listenSubmitedForm($forms, $request);

        if ($formIsSubmited) {
            $this->addFlash(self::SUCCESS, 'Votre profil a bien été mis à jour !');
            $this->userLogger->addLogg(self::INFO, $this->getRequest(), $this->getUser(), 'Mis à jour de son profil');
            return $this->redirectToRoute(self::PROFESSIONNEL_PROFIL);
        }

        return $this->render('pages/front/professionnel/profil.html.twig', [
            'formInfoProfil' => $formInfoProfil->createView(),
            'formExperience' => $formExperience->createView(),
            'formFormation' => $formFormation->createView(),
            'formLangue' => $formLangue->createView(),
            'experiences' => $this->entityManager->getRepository(Experience::class)->findBy([self::USER => $user]),
            'formations' => $this->entityManager->getRepository(Formation::class)->findBy([self::USER => $user]),
            'langues' => $this->entityManager->getRepository(Langue::class)->findBy([self::USER => $user])
        ]);
    }

    /**
     * @Route("/{slug}/detail", name="professionnel_detail")
     * @Security("is_granted('ROLE_PROFESSIONNEL') or is_granted('ROLE_ENTREPRISE')")
     */
    public function detail($slug, Request $request, Professionnel $professionnel)
    {
        $user = $this->entityManager->getRepository(User::class)->findOneBy([self::EMAIL => $slug]);
        if (!$user) {
            return $this->redirectToRoute('entreprise_dashboard');
        }

        $professionnel->addNewVue($user);
        return $this->render('pages/front/professionnel/detail.html.twig', [
            self::USER => $user,
            'experiences' => $this->entityManager->getRepository(Experience::class)->findBy([self::USER => $user]),
            'formations' => $this->entityManager->getRepository(Formation::class)->findBy([self::USER => $user]),
            'langues' => $this->entityManager->getRepository(Langue::class)->findBy([self::USER => $user])
        ]);
    }

    /**
     * @Route("/secteur/liste", name="professionnel_secteur_liste")
     * @Security("is_granted('ROLE_PROFESSIONNEL') or is_granted('ROLE_ENTREPRISE')")
     */
    public function secteur(Request $request)
    {
        return new Response(json_encode($this->renderView('pages/front/entreprise/_liste-professionnels.html.twig', [
            'userSecteurs' => $this->entityManager->getRepository(Usersecteur::class)->findBy(['secteur' => $request->get('id')])
        ])));
    }

    /**
     * @Route("/edit-profil", name="edit_profil")
     * @Security("is_granted('ROLE_PROFESSIONNEL')")
     */
    public function editProfil(Request $request, Professionnel $professionnel)
    {
        $class = $request->get('entity');
        $nameForm = $request->get('nameForm');
        $namePage = $request->get('namePage');
        $id = $request->get('id');

        $forms = $professionnel->getRequiredForm($class, $id);

        if (!$forms) {
            return $this->redirectToRoute('professionnel_dashboard');
        }

        $formIsSubmited = $professionnel->listenSubmitedForm($forms, $request);

        if ($formIsSubmited) {
            $this->addFlash(self::SUCCESS, 'Votre profil a bien été mis à jour !');
            $this->userLogger->addLogg(self::INFO, $this->getRequest(), $this->getUser(), 'Mis à jour de son profil');
            return $this->redirectToRoute(self::PROFESSIONNEL_PROFIL);
        }
        return new Response(json_encode($this->renderView('pages/front/professionnel/forms/_' . $namePage . '.html.twig', [$nameForm => $forms[0][self::FORM]->createView(), self::ENTITY => $forms[0][self::ENTITY], 'edit' => true])));
    }
}
