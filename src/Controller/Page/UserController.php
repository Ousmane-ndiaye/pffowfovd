<?php

namespace App\Controller\Page;

use App\Controller\BaseController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use App\Form\GeneralUserInfoType;
use App\Service\Professionnel;

/**
 * @Route("/user")
 */
class UserController extends BaseController
{
    /**
     * @Route("/parametres", name="user_parametres")
     * @Security("is_granted('ROLE_PROFESSIONNEL') or is_granted('ROLE_ENTREPRISE')")
     */
    public function parametres(Request $request, Professionnel $professionnelService)
    {
        $user = $this->getUser();
        $formgeneralUserInfo = $this->createForm(GeneralUserInfoType::class, $user);
        $formgeneralUserInfo->handleRequest($request);
        if ($formgeneralUserInfo->isSubmitted() && $formgeneralUserInfo->isValid()) {
            $professionnelService->updateGeneralInfo();
            $this->addFlash(self::SUCCESS, 'Votre profil a bien été mis à jour !');
            $this->userLogger->addLogg(self::INFO, $this->getRequest(), $this->getUser(), 'Mis à jour des informations de son compte.');
            return $this->redirectToRoute('user_parametres');
        }

        return $this->render('pages/front/user/parametres.html.twig', [
            'formgeneralUserInfo' =>  $formgeneralUserInfo->createView()
        ]);
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
