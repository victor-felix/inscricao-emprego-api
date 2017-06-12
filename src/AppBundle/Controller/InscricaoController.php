<?php

namespace AppBundle\Controller;

use Domain\Model\Inscricao\Inscricao;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\FOSRestController;
use Presentation\DataTransferObject\ConfirmarInscricaoDTO;
use Presentation\DataTransferObject\InscricaoDTO;
use Presentation\DataTransferObject\PesquisarInscricaoDTO;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Post;

class InscricaoController extends FOSRestController
{
    /**
     * @Post("/inscricao/inscrever")
     *
     * @param Request $request
     * @return Response
     */
    public function inscreverAction(Request $request)
    {
        $serializerService = $this->get('infra.serializer.service');
        $jsonResponse = $this->get('infra.json_response.service');
        $inscricaoService = $this->get('app.inscricao.service');

        try{
            $inscricaoDTO = $serializerService->converter($request->getContent(), InscricaoDTO::class);
            $inscricao = new Inscricao($inscricaoDTO->getCandidato(), $inscricaoDTO->getOportunidade());
            $inscricaoId = $inscricaoService->inscrever($inscricao);
        }catch (Exception $exception) {
            return $jsonResponse->badRequest($exception->getMessage());
        }

        return $jsonResponse->success($inscricaoId);
    }

    /**
     * @Put("/inscricao/confirmar")
     *
     * @param Request $request
     * @return Response
     */
    public function confirmarInscricaoAction(Request $request)
    {
        $serializerService = $this->get('infra.serializer.service');
        $jsonResponse = $this->get('infra.json_response.service');
        $inscricaoService = $this->get('app.inscricao.service');

        try{
            $inscricao = $serializerService->converter($request->getContent(), ConfirmarInscricaoDto::class);
            $inscricaoService->confirmarInscricao($inscricao->getInscricao(), $inscricao->getCodigoConfirmacao());
        }catch (Exception $exception) {
            return $jsonResponse->badRequest($exception->getMessage());
        }

        return $jsonResponse->success();
    }

    /**
     * @Post("/inscricao/pesquisar")
     *
     * @param Request $request
     * @return Response
     */
    public function pesquisarAction(Request $request) {
        $serializerService = $this->get('infra.serializer.service');
        $jsonResponse = $this->get('infra.json_response.service');
        $inscricaoService = $this->get('app.inscricao.service');

        try{
            $inscricao = $serializerService->converter($request->getContent(), PesquisarInscricaoDTO::class);
            $resultado = $inscricaoService->pesquisar($inscricao);
        }catch (Exception $exception) {
            return $jsonResponse->badRequest($exception->getMessage());
        }

        return $jsonResponse->success($resultado);
    }
}