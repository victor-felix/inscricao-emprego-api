<?php

namespace Presentation\DataTransferObject;

use DateTimeInterface;

class OportunidadeDTO
{
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
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDataInicio()
    {
        return $this->dataInicio;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDataFinal()
    {
        return $this->dataFinal;
    }

    /**
     * @return int
     */
    public function getQtdVagas()
    {
        return $this->qtdVagas;
    }
}
