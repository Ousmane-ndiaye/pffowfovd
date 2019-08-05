<?php

namespace App\Controller\Page;

use App\Controller\BaseController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use App\Entity\Secteur;
use App\Entity\Entreprise;
use App\Entity\User;
use App\Entity\Personnes;

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
     * @Route("/profil/{slug}/{email}", name="entreprise_profil")
     */
    public function profil(Request $request, $slug, $email = null)
    {
        $entreprise = $this->entityManager->getRepository(Entreprise::class)->findOneBy([self::SLUG => $slug]);
        if (!$entreprise) {
            return $this->redirectToRoute(self::HOME_PAGE);
        }
        $data = [self::ENTREPRISE => $entreprise];
        if ($email != null && $user = $this->entityManager->getRepository(User::class)->findOneBy([self::EMAIL => $email])) {
            $data[self::USER] = $user;
        }

        /* if (!$user || $entreprise || !$this->entityManager->getRepository(Personnes::class)->findOneBy([self::USER => $user, self::ENTREPRISE => $entreprise])) {
            //Render access denied !
        } */

        return $this->render('pages/front/entreprise/profil.html.twig', $data);
    }
}
