<?php

namespace Domain\Model\ExperienciaProfissional;

class ExperienciaProfissional
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