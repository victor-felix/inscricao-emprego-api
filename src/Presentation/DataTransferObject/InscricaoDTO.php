<?php

namespace Presentation\DataTransferObject;

use Domain\Model\Candidato\Candidato;
use Domain\Model\Oportunidade\Oportunidade;

class InscricaoDTO
{
    /**
     * @var Candidato
     */
    private $candidato;

    /**
     * @var Oportunidade
     */
    private $oportunidade;

    /**
     * @return Candidato
     */
    public function getCandidato()
    {
        return $this->candidato;
    }

    /**
     * @return Oportunidade
     */
    public function getOportunidade()
    {
        return $this->oportunidade;
    }
}
