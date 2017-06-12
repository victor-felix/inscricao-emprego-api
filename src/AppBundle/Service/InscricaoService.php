<?php

namespace AppBundle\Service;

use Domain\Model\Inscricao\Inscricao;
use Domain\Model\Inscricao\InscricaoRepositoryInterface;
use Domain\Service\InscricaoServiceInterface;
use Exception;
use Presentation\DataTransferObject\PesquisarInscricaoDTO;

class InscricaoService implements InscricaoServiceInterface
{
    /**
     * @var EventDispatcherService
     */
    private $eventDispatcherService;

    /**
     * @var InscricaoRepositoryInterface
     */
    private $inscricaoRepository;

    /**
     * InscricaoService constructor.
     * @param InscricaoRepositoryInterface $inscricaoRepository
     */
    public function __construct(EventDispatcherService $eventDispatcherService,
                                InscricaoRepositoryInterface $inscricaoRepository
    ) {
        $this->eventDispatcherService = $eventDispatcherService;
        $this->inscricaoRepository = $inscricaoRepository;
    }

    /**
     * @param Inscricao $inscricao
     * @return int
     * @throws Exception
     */
    public function inscrever(Inscricao $inscricao) {

        $existe = $this->inscricaoRepository->findOneByCpfOportunidade($inscricao);

        if($existe){
            throw new Exception("Você já se inscreveu nesta oportunidade.");
        }

        $inscricao->gerarCodigoConfirmacao();

        $this->inscricaoRepository->save($inscricao);
        $this->eventDispatcherService->dispatchInscricaoEvent($inscricao);

        return $inscricao->getId();
    }

    public function buscarPorId(int $id) {
        return $this->inscricaoRepository->findOneById($id);
    }

    /**
     * @param Inscricao $inscricao
     * @param string $codigoConfirmacao
     * @throws Exception
     */
    public function confirmarInscricao(Inscricao $inscricao, string $codigoConfirmacao)
    {
        if($inscricao->getCodigoConfirmacao() != $codigoConfirmacao) {
            throw new Exception("Código de confirmação inválido.");
        }

        $inscricao->ativar();
        $this->inscricaoRepository->save($inscricao);
    }

    public function pesquisar(PesquisarInscricaoDTO $pesquisarInscricaoDTO) {
        return $this->inscricaoRepository->findAllByDadosPesquisa($pesquisarInscricaoDTO);
    }
}
