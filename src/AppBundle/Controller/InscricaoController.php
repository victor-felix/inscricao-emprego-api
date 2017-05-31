<?php

namespace AppBundle\Controller;

use Domain\Model\Inscricao\Inscricao;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Post;

class InscricaoController extends FOSRestController
{
    /**
     * @Post("/inscrever")
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
            $inscricao = $serializerService->converter($request->getContent(), Inscricao::class);
            $inscricaoService->inscrever($inscricao);
        }catch (Exception $exception) {
            return $jsonResponse->badRequest($exception->getMessage());
        }

        return $jsonResponse->success();
    }
}