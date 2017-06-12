<?php

namespace Domain\Model\Oportunidade;

interface OportunidadeRepositoryInterface
{
    /**
     * @param Oportunidade $oportunidade
     * @return void
     */
    public function save(Oportunidade $oportunidade);

    /**
     * @return array
     */
    public function findAllOportunidade();
}