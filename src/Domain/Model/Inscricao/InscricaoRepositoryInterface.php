<?php

namespace Domain\Model\Inscricao;

interface InscricaoRepositoryInterface
{
    /**
     * @param Inscricao $inscricao
     * @return void
     */
    public function save(Inscricao $inscricao);
}