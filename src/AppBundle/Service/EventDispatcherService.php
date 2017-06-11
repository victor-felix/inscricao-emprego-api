<?php

namespace AppBundle\Service;

use AppBundle\Event\InscricaoEvent;
use Domain\Model\Inscricao\Inscricao;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class EventDispatcherService
{
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * EventDispatcherService constructor.
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param Inscricao $inscricao
     */
    public function dispatchInscricaoEvent(Inscricao $inscricao)
    {
        $inscricaoEvent = new InscricaoEvent($inscricao);
        $this->eventDispatcher->dispatch(InscricaoEvent::INSCRICAO, $inscricaoEvent);
    }
}