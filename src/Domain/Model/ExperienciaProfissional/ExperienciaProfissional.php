<?php

namespace Domain\Model\ExperienciaProfissional;

use DateTimeInterface;

class ExperienciaProfissional
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string;
     */
    private $cargo;

    /**
     * @var string;
     */
    private $descricao;

    /**
     * @var DateTimeInterface
     */
    private $dataInicio;

    /**
     * @var DateTimeInterface
     */
    private $dataFim;

    /**
     * @var bool
     */
    private $trabalhoAtual;
}