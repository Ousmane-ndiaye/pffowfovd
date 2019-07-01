<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\GestionDeslogs;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class BaseController extends AbstractController
{
    //Les constantes globales
    const HOME_PAGE = 'app_home';
    const PROFIL = 'profil';
    const FORM = 'form';
    const DANGER = 'danger';
    const INFO = 'info';
    const SUCCESS = 'success';
    const EMAIL = 'email';
    const USER = 'user';


    //Les variables globales
    protected $userLogger;

    protected $entityManager;

    protected $userRepository;

    protected $passwordEncoder;

    protected $swiftMailer;


    public function __construct(GestionDeslogs $logger, EntityManagerInterface $entityMngr, \Swift_Mailer $mailer, UserPasswordEncoderInterface $pwdEncoder)
    {
        $this->userLogger = $logger;
        $this->entityManager = $entityMngr;
        $this->userRepository = $this->entityManager->getRepository(User::class);
        $this->passwordEncoder = $pwdEncoder;
        $this->swiftMailer = $mailer;
    }

    //Les fonctions globlales
    public function getRequest()
    {
        return $this->container->get('request_stack')->getCurrentRequest();
    }

    public static function slugify(string $string): string
    {
        return preg_replace('/\s+/', '-', mb_strtolower(trim(strip_tags($string)), 'UTF-8'));
    }
}
