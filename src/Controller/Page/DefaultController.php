<?php

namespace App\Controller\Page;

use App\Controller\BaseController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends BaseController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index()
    {
        return $this->addToCache($this->render('pages/default/index.html.twig', []));
    }
}
