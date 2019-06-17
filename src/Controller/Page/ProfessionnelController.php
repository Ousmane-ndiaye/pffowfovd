<?php

namespace App\Controller\Page;

use App\Controller\BaseController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/professionnel")
 */
class ProfessionnelController extends BaseController
{
    /**
     * @Route("/dashboard", name="professionnel_dashboard")
     */
    public function dashboard(Request $request)
    {
        return $this->render('pages/front/dashboard/professionnel.html.twig', []);
    }

    /**
     * @Route("/{slug}/detail", name="professionnel_detail")
     */
    public function detail($slug, Request $request)
    {
        return $this->render('pages/front/professionnel/detail.html.twig', []);
    }
}
