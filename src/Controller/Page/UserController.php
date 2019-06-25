<?php

namespace App\Controller\Page;

use App\Controller\BaseController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/user")
 */
class UserController extends BaseController
{
    /**
     * @Route("/parametres", name="user_parametres")
     * @Security("is_granted('ROLE_PROFESSIONNEL') or is_granted('ROLE_ENTREPRISE')")
     */
    public function parametres(Request $request)
    {
        return $this->render('pages/front/user/parametres.html.twig', []);
    }

    /**
     * @Route("/info-paiement", name="info_paiement")
     * @Security("is_granted('ROLE_PROFESSIONNEL') or is_granted('ROLE_ENTREPRISE')")
     */
    public function infoPaiement(Request $request)
    {
        return $this->render('pages/front/user/info-paiement.html.twig', []);
    }
}
