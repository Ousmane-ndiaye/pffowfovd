<?php

namespace App\Controller\Page;

use App\Controller\BaseController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/entreprise")
 */
class EntrepriseController extends BaseController
{
    /**
     * @Route("/dashboard", name="entreprise_dashboard")
     */
    public function dashboard(Request $request)
    {
        return $this->addToCache($this->render('pages/front/dashboard/entreprise.html.twig', []));
    }
}
