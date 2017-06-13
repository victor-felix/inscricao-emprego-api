<?php

namespace AppBundle\Service;

use Domain\Model\Inscricao\Inscricao;
use Domain\Model\Inscricao\InscricaoRepositoryInterface;
use Domain\Service\InscricaoServiceInterface;
use Exception;
use Infrastructure\Service\StorageService;
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
     * @var StorageService
     */
    private $storageService;

    /**
     * InscricaoService constructor.
     * @param EventDispatcherService $eventDispatcherService
     * @param InscricaoRepositoryInterface $inscricaoRepository
     * @param StorageService $storageService
     */
    public function __construct(EventDispatcherService $eventDispatcherService,
                                InscricaoRepositoryInterface $inscricaoRepository,
                                StorageService $storageService
    ) {
        $this->eventDispatcherService = $eventDispatcherService;
        $this->inscricaoRepository = $inscricaoRepository;
        $this->storageService = $storageService;
    }

    /**
     * @param Inscricao $inscricao
     * @return int
     * @throws Exception
     */
    public function inscrever(Inscricao $inscricao) {

        if($inscricao->hasAnexo()) {
            $nomeArquivo = $this->storageService->salvarBase64($inscricao->getCandidato()->getAnexo());
            $inscricao->addAnexoCandidato($nomeArquivo);
        }

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
