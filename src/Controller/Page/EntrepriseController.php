<?php

namespace App\Controller\Page;

use App\Controller\BaseController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use App\Entity\Secteur;

/**
 * @Route("/entreprise")
 */
class EntrepriseController extends BaseController
{
    /**
     * @Route("/dashboard", name="entreprise_dashboard")
     * @Security("is_granted('ROLE_ENTREPRISE')")
     */
    public function dashboard(Request $request)
    {
        return $this->render('pages/front/dashboard/entreprise.html.twig', [
            'secteurs' => $this->entityManager->getRepository(Secteur::class)->findAll()
        ]);
    }

    /**
     * @Route("/profil", name="entreprise_profil")
     * @Security("is_granted('ROLE_ENTREPRISE')")
     */
    public function profil(Request $request)
    {
        return $this->render('pages/front/entreprise/profil.html.twig', []);
    }
}
