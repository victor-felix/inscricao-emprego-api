<?php

namespace Domain\Model\Inscricao;

use Presentation\DataTransferObject\PesquisarInscricaoDTO;

interface InscricaoRepositoryInterface
{
    /**
     * @param Inscricao $inscricao
     * @return void
     */
    public function save(Inscricao $inscricao);

    /**
     * @param int $id
     * @return Inscricao
     */
    public function findOneById(int $id);

    /**
     * @param Inscricao $inscricao
     * @return mixed
     */
    public function findOneByCpfOportunidade(Inscricao $inscricao);

    /**
     * @param PesquisarInscricaoDTO $pesquisarInscricaoDTO
     * @return mixed
     */
    public function findAllByDadosPesquisa(PesquisarInscricaoDTO $pesquisarInscricaoDTO);
}