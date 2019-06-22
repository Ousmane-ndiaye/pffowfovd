<?php

namespace App\Controller\Page;

use App\Controller\BaseController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/faqs")
 */
class FaqsController extends BaseController
{
    /**
     * @Route("/", name="index_faqs")
     */
    public function index()
    {
        return $this->addToCache($this->render('pages/front/faqs/index.html.twig', []));
    }
}
