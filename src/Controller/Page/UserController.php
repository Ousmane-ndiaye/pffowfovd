<?php

namespace App\Controller\Page;

use App\Controller\BaseController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
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
        $formgeneralUserInfo = $this->createForm(GeneralUserInfoType::class, $user)
            ->add('image', FileType::class, [
                'label' => 'Photo de profil',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png'
                        ],
                        'mimeTypesMessage' => 'Please upload a valid picture',
                    ])
                ],
            ]);

        $formgeneralUserInfo->handleRequest($request);
        if ($formgeneralUserInfo->isSubmitted() && $formgeneralUserInfo->isValid()) {
            $image = $formgeneralUserInfo->get('image')->getData();

            if ($image) {
                $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename =  $originalFilename; // transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$image->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $image->move(
                        $this->getParameter('profils_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $user->setImage($newFilename);
            }
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
