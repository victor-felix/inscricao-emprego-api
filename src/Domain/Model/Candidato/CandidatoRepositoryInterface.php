<?php

namespace Domain\Model\Candidato;

interface CandidatoRepositoryInterface
{
    /**
     * @param Candidato $candidato
     * @return void
     */
    public function save(Candidato $candidato);
}