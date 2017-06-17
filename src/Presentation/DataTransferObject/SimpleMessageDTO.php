<?php

namespace Presentation\DataTransferObject;

class SimpleMessageDTO
{
    /**
     * @var string
     */
    private $mensagem;

    /**
     * SimpleMessageDTO constructor.
     * @param string $mensagem
     */
    public function __construct(string $mensagem)
    {
        $this->mensagem = $mensagem;
    }

    /**
     * @return string
     */
    public function getMensagem()
    {
        return $this->mensagem;
    }
}