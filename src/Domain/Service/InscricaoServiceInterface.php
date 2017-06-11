<?php

namespace Domain\Service;

use Domain\Model\Inscricao\Inscricao;

interface InscricaoServiceInterface
{
    /**
     * @param Inscricao $inscricao
     * @return int
     */
    public function inscrever(Inscricao $inscricao);
}