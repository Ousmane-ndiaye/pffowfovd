<?php


namespace App\Utils;


use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class SendMailHelper
{

    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var \Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface
     */
    private $params;

    public function __construct(\Swift_Mailer $mailer, ParameterBagInterface $params)
    {
        $this->mailer = $mailer;
        $this->params = $params;
    }

    public function sendEmail(?string $from, $recipients, string $subject, array $body)
    {
        list($content, $contentType, $charset) = $body;
        $message = (new \Swift_Message($subject))
          ->setFrom($from ?? $this->params->get('app.mail'))
          ->setTo($recipients)
          ->setBody($content, $contentType ?? 'text/html', $charset);

        return $this->mailer->send($message);
    }
}