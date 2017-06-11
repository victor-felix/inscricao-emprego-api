<?php

namespace Domain\Model\Inscricao;

use Domain\Model\Candidato\Candidato;
use Domain\Model\Oportunidade\Oportunidade;

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
     * @var Oportunidade
     */
    private $oportunidade;

    /**
     * @var string
     */
    private $codigoConfirmacao;

    /**
     * @var bool
     */
    private $ativa;

    /**
     * Inscricao constructor.
     * @param Candidato $candidato
     * @param Oportunidade $oportunidade
     */
    public function __construct(Candidato $candidato, Oportunidade $oportunidade)
    {
        $this->candidato = $candidato;
        $this->oportunidade = $oportunidade;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Candidato
     */
    public function getCandidato(): Candidato
    {
        return $this->candidato;
    }

    /**
     * @return Oportunidade
     */
    public function getOportunidade(): Oportunidade
    {
        return $this->oportunidade;
    }

    /**
     * @return string
     */
    public function getCodigoConfirmacao(): string
    {
        return $this->codigoConfirmacao;
    }

    /**
     * gera o código de confirmação uniqid com 6 caracteres, onde nunca será repitido.
     */
    public function gerarCodigoConfirmacao() {
        $this->codigoConfirmacao = substr(uniqid(rand(), true), -6, 6);
    }
}
