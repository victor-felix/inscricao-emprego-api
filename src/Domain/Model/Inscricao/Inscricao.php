<?php

namespace Domain\Model\Inscricao;

use Domain\Model\Candidato\Candidato;

class Inscricao
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Candidato
     */
    private $candidato;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTeste()
    {
        return $this->teste;
    }

    /**
     * @return Candidato
     */
    public function getCandidato(): Candidato
    {
        return $this->candidato;
    }
}
