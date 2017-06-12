<?php

namespace Presentation\DataTransferObject;

use Domain\Model\Inscricao\Inscricao;

class ConfirmarInscricaoDTO
{
    /**
     * @var Inscricao
     */
    private $inscricao;

    /**
     * @var string
     */
    private $codigoConfirmacao;

    /**
     * @return Inscricao
     */
    public function getInscricao()
    {
        return $this->inscricao;
    }

    /**
     * @return string
     */
    public function getCodigoConfirmacao()
    {
        return $this->codigoConfirmacao;
    }
}
