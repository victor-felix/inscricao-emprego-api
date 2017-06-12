<?php

namespace Domain\Service;

use Domain\Model\Oportunidade\Oportunidade;

interface OportunidadeServiceInterface
{
    /**
     * @param Oportunidade $oportunidade
     * @return void
     */
    public function salvar(Oportunidade $oportunidade);

    /**
     * @return array
     */
    public function listarTudo();
}