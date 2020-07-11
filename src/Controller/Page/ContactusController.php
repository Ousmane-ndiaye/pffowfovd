<?php

namespace App\Controller\Page;

use App\Entity\Contactus;
use App\Form\ContactusType;
use App\Repository\ContactusRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\BaseController;

/**
 * @Route("/contactus")
 */
class ContactusController extends BaseController
{
    /**
     * @Route("/", name="contactus_index", methods={"GET"})
     */
    public function index(ContactusRepository $contactusRepository): Response
    {
        return $this->render('pages/front/contactus/index.html.twig', [
            'contactuses' => $contactusRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="contactus_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $contactus = new Contactus();
        $form = $this->createForm(ContactusType::class, $contactus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contactus);
            $entityManager->flush();

            $this->addFlash(self::SUCCESS, 'Votre message a été envoyer avec succès!');

            return $this->redirectToRoute('contactus_new');
        }

        return $this->render('pages/front/contactus/new.html.twig', [
            'contactus' => $contactus,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contactus_show", methods={"GET"})
     */
    public function show(Contactus $contactus): Response
    {
        return $this->render('pages/front/contactus/show.html.twig', [
            'contactus' => $contactus,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="contactus_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Contactus $contactus): Response
    {
        $form = $this->createForm(ContactusType::class, $contactus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contactus_index', [
                'id' => $contactus->getId(),
            ]);
        }

        return $this->render('pages/front/contactus/edit.html.twig', [
            'contactus' => $contactus,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contactus_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Contactus $contactus): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contactus->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contactus);
            $entityManager->flush();
        }

        return $this->redirectToRoute('contactus_index');
    }
}
