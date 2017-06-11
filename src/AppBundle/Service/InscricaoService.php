<?php

namespace AppBundle\Service;

use Domain\Model\Inscricao\Inscricao;
use Domain\Model\Inscricao\InscricaoRepositoryInterface;
use Domain\Service\InscricaoServiceInterface;

class InscricaoService implements InscricaoServiceInterface
{
    /**
     * @var EventDispatcherService
     */
    private $eventDispatcherService;

    /**
     * @var InscricaoRepositoryInterface
     */
    private $inscricaoRepository;

    /**
     * InscricaoService constructor.
     * @param InscricaoRepositoryInterface $inscricaoRepository
     */
    public function __construct(EventDispatcherService $eventDispatcherService,
                                InscricaoRepositoryInterface $inscricaoRepository
    ) {
        $this->eventDispatcherService = $eventDispatcherService;
        $this->inscricaoRepository = $inscricaoRepository;
    }

    /**
     * @param Inscricao $inscricao
     * @return int
     */
    public function inscrever(Inscricao $inscricao) {
        $inscricao->gerarCodigoConfirmacao();

        $this->inscricaoRepository->save($inscricao);
        $this->eventDispatcherService->dispatchInscricaoEvent($inscricao);

        return $inscricao->getId();
    }
}
