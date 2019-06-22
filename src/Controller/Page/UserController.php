<?php

namespace App\Controller\Page;

use App\Controller\BaseController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/user")
 */
class UserController extends BaseController
{
    /**
     * @Route("/parametres", name="use_parametres")
     */
    public function parametres(Request $request)
    {
        return $this->addToCache($this->render('pages/front/user/parametres.html.twig', []));
    }

    /**
     * @Route("/info-paiement", name="info_paiement")
     */
    public function infoPaiement(Request $request)
    {
        return $this->addToCache($this->render('pages/front/user/info-paiement.html.twig', []));
    }
}
