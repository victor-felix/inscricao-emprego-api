<?php

namespace Infrastructure\Service;

use JMS\Serializer\Serializer;
use Presentation\DataTransferObject\SimpleMessageDTO;
use Symfony\Component\HttpFoundation\Response;

final class JsonResponseService
{
    /**
     * @var SerializerService
     */
    private $serializerService;

    /**
     * ResponseJsonMessage constructor.
     * @param SerializerService $serializerService
     */
    public function __construct(SerializerService $serializerService)
    {
        $this->serializerService = $serializerService;
    }

    /**
     * @param null $objeto
     * @param array $grupos
     * @return Response
     */
    public function success($objeto = null, array $grupos = ['default'])
    {
        return $this->gerarResponse(Response::HTTP_OK, $grupos, $objeto);
    }

    /**
     * @param string|null $mensagem
     * @param array $grupos
     * @return Response
     */
    public function badRequest(string $mensagem = null, array $grupos = ['default'])
    {
        return $this->gerarResponse(
            Response::HTTP_BAD_REQUEST,
            $grupos,
            $this->objetoResposta($mensagem)
        );
    }

    /**
     * @param string|null $mensagem
     * @param array $grupos
     * @return Response
     */
    public function internalError(string $mensagem = null, array $grupos = ['default'])
    {
        return $this->gerarResponse(
            Response::HTTP_INTERNAL_SERVER_ERROR,
            $grupos,
            $this->objetoResposta($mensagem)
        );
    }

    /**
     * @param string|null $mensagem
     * @param array $grupos
     * @return Response
     */
    public function notFound(string $mensagem = null, array $grupos = ['default'])
    {
        return $this->gerarResponse(
            Response::HTTP_NOT_FOUND,
            $grupos,
            $this->objetoResposta($mensagem)
        );
    }

    /**
     * @param string|null $mensagem
     * @param array $grupos
     * @return Response
     */
    public function forbidden(string $mensagem = null, array $grupos = ['default'])
    {
        return $this->gerarResponse(
            Response::HTTP_FORBIDDEN,
            $grupos,
            $this->objetoResposta($mensagem)
        );
    }

    /**
     * @param int $code
     * @param null $objeto
     * @param $grupos
     * @return Response
     */
    private function gerarResponse(
        int $code,
        array $grupos,
        $objeto = null
    ) : Response {
        if (!$objeto) {
            return new Response('', $code);
        }

        return new Response(
            $this->serializerService->toJsonByGroups($objeto, $grupos),
            $code,
            ['Content-type' => 'application/json']
        );
    }

    private function objetoResposta(string $mensagem = null)
    {
        return $mensagem ? new SimpleMessageDTO($mensagem) : null;
    }
}
