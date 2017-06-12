<?php

namespace Presentation\DataTransferObject;

use Domain\Model\Oportunidade\Oportunidade;

class PesquisarInscricaoDTO
{
    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $cpf;

    /**
     * @var Oportunidade
     */
    private $oportunidade;

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @return Oportunidade
     */
    public function getOportunidade()
    {
        return $this->oportunidade;
    }
}