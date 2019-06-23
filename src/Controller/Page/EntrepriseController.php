<?php

namespace App\Controller\Page;

use App\Controller\BaseController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


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
        return $this->render('pages/front/dashboard/entreprise.html.twig', []);
    }
}
