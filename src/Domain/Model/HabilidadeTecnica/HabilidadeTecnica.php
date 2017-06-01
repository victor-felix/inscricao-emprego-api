<?php

namespace Domain\Model\HabilidadeTecnica;

class HabilidadeTecnica
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string;
     */
    private $descricao;

    /**
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }
}