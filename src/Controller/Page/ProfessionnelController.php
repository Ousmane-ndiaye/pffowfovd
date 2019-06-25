<?php

namespace App\Controller\Page;

use App\Controller\BaseController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use App\Form\InformationProfilType;
use App\Entity\Infoprofil;
use Symfony\Component\Security\Core\User\User;
use App\Form\ExperienceType;
use App\Entity\Experience;

/**
 * @Route("/professionnel")
 */
class ProfessionnelController extends BaseController
{
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
    public function profil(Request $request)
    {
        $user = $this->getUser();
        $infoProfil = $user->getInfoProfil();
        $experience = new Experience();
        if (!$infoProfil) {
            $infoProfil = new Infoprofil();
            $infoProfil->setUser($user);
            $this->entityManager->persist($infoProfil);
        }
        $formInfoProfil = $this->createForm(InformationProfilType::class, $infoProfil);
        $formExperience = $this->createForm(ExperienceType::class, $experience);
        return $this->render('pages/front/professionnel/profil.html.twig', [
            'formInfoProfil' => $formInfoProfil->createView(),
            'formExperience' => $formExperience->createView()
        ]);
    }

    /**
     * @Route("/{slug}/detail", name="professionnel_detail")
     * @Security("is_granted('ROLE_PROFESSIONNEL')")
     */
    public function detail($slug, Request $request)
    {
        return $this->render('pages/front/professionnel/detail.html.twig', []);
    }
}
