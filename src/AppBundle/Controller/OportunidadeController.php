<?php

namespace AppBundle\Controller;

use Domain\Model\Oportunidade\Oportunidade;
use Exception;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OportunidadeController extends FOSRestController
{
    /**
     * @Post("/oportunidade/salvar")
     *
     * @param Request $request
     * @return Response
     */
    public function salvarAction(Request $request)
    {
        $serializerService = $this->get('infra.serializer.service');
        $jsonResponse = $this->get('infra.json_response.service');
        $oportunidadeService = $this->get('app.oportunidade.service');

        try{
            $oportunidade = $serializerService->converter($request->getContent(), Oportunidade::class);
            $oportunidadeService->salvar($oportunidade);
        } catch (Exception $exception) {
            return $jsonResponse->badRequest($exception->getMessage());
        }

        return $jsonResponse->success();
    }

    /**
     * @Get("/oportunidade/listar")
     *
     * @return Response
     */
    public function getOportunidadesAction() {
        $jsonResponseService = $this->get('infra.json_response.service');
        $oportunidadeService = $this->get('app.oportunidade.service');

        try{
            $result = $oportunidadeService->listarTudo();
        } catch (Exception $exception) {
            return $jsonResponseService->badRequest($exception->getMessage());
        }

        return $jsonResponseService->success($result);
    }
}
