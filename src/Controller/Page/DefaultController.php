<?php

namespace App\Controller\Page;

use App\Controller\BaseController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Plan;

class DefaultController extends BaseController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index()
    {
        return $this->render('pages/default/index.html.twig', [
            'plans' => $this->entityManager->getRepository(Plan::class)->findAll()
        ]);
    }
}
