<?php

namespace AppBundle\EventListener;

use AppBundle\Event\InscricaoEvent;
use Infrastructure\Service\EmailService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EnviarEmailSubscriber implements EventSubscriberInterface
{
    /**
     * @var EmailService
     */
    private $emailService;

    /**
     * SendEmailSubscriber constructor.
     * @param EmailService $emailService
     */
    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public static function getSubscribedEvents()
    {
        return [
            InscricaoEvent::INSCRICAO => [['onInscricao', 200]]
        ];
    }

    /**
     * @param InscricaoEvent $event
     */
    public function onInscricao(InscricaoEvent $event)
    {
        $inscricao = $event->getInscricao();
        $this->emailService->enviarNotificacaoInscricao($inscricao);
    }
}