<?php

namespace Domain\Model\Oportunidade;

use DateTimeInterface;

class Oportunidade
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $titulo;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var DateTimeInterface
     */
    private $dataInicio;

    /**
     * @var DateTimeInterface
     */
    private $dataFinal;

    /**
     * @var int
     */
    private $qtdVagas;

    /**
     * Oportunidade constructor.
     * @param string $titulo
     * @param string $descricao
     * @param int $qtdVagas
     * @param DateTimeInterface $dataInicio
     * @param DateTimeInterface $dataFinal
     */
    public function __construct(string $titulo,
                                string $descricao,
                                int $qtdVagas,
                                DateTimeInterface $dataInicio,
                                DateTimeInterface $dataFinal)
    {
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->dataInicio = $dataInicio;
        $this->dataFinal = $dataFinal;
        $this->qtdVagas = $qtdVagas;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}