<?php

namespace AppBundle\Service;

use Domain\Model\Inscricao\Inscricao;
use Domain\Model\Inscricao\InscricaoRepositoryInterface;
use Domain\Service\InscricaoServiceInterface;

class InscricaoService implements InscricaoServiceInterface
{
    /**
     * @var InscricaoRepositoryInterface
     */
    private $inscricaoRepository;

    /**
     * InscricaoService constructor.
     * @param InscricaoRepositoryInterface $inscricaoRepository
     */
    public function __construct(InscricaoRepositoryInterface $inscricaoRepository)
    {
        $this->inscricaoRepository = $inscricaoRepository;
    }

    public function inscrever(Inscricao $inscricao) {
        $this->inscricaoRepository->save($inscricao);
    }
}
