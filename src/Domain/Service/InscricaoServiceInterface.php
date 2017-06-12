<?php

namespace Domain\Service;

use Domain\Model\Inscricao\Inscricao;
use Exception;

interface InscricaoServiceInterface
{
    /**
     * @param Inscricao $inscricao
     * @return int
     */
    public function inscrever(Inscricao $inscricao);

    /**
     * @param int $id
     * @return mixed
     */
    public function buscarPorId(int $id);

    /**
     * @param Inscricao $inscricao
     * @param string $codigoConfirmacao
     * @throws Exception
     */
    public function confirmarInscricao(Inscricao $inscricao, string $codigoConfirmacao);
}