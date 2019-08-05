<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\GestionDeslogs;
use App\Entity\User;
use Mgilet\NotificationBundle\Manager\NotificationManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Utils\SendMailHelper;

class BaseController extends AbstractController
{
    //Les constantes globales
    const HOME_PAGE = 'app_home';
    const SLUG = 'slug';
    const PROFIL = 'profil';
    const FORM = 'form';
    const DANGER = 'danger';
    const INFO = 'info';
    const SUCCESS = 'success';
    const EMAIL = 'email';
    const USER = 'user';
    const ENTREPRISE = 'entreprise';
    const SECTEUR = 'secteur';
    const APP_EMAIL = 'sunucvideo221@gmail.com';


    //Les variables globales
    protected $userLogger;

    protected $entityManager;

    protected $userRepository;

    protected $passwordEncoder;

    protected $sendMailHelper;

    protected $notifManager;


    public function __construct(GestionDeslogs $logger, EntityManagerInterface $entityMngr, SendMailHelper $mailer, UserPasswordEncoderInterface $pwdEncoder, NotificationManager $manager)
    {
        $this->userLogger = $logger;
        $this->entityManager = $entityMngr;
        $this->userRepository = $this->entityManager->getRepository(User::class);
        $this->passwordEncoder = $pwdEncoder;
        $this->sendMailHelper = $mailer;
        $this->notifManager = $manager;
    }

    //Les fonctions globlales
    public function getRequest()
    {
        return $this->container->get('request_stack')->getCurrentRequest();
    }

    public static function slugify(string $string): string
    {
        return preg_replace('/[^a-zA-Z0-9\']/', '-', mb_strtolower(trim(strip_tags($string)), 'UTF-8'));
    }
}
