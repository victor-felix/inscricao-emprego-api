<?php

namespace Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityRepository;
use Domain\Model\Inscricao\Inscricao;
use Domain\Model\Inscricao\InscricaoRepositoryInterface;
use Presentation\DataTransferObject\PesquisarInscricaoDTO;

class InscricaoRepository extends EntityRepository implements InscricaoRepositoryInterface
{
    /**
     * @param Inscricao $inscricao
     */
    public function save(Inscricao $inscricao)
    {
        $this->getEntityManager()->persist($inscricao);
        $this->getEntityManager()->flush();
    }

    /**
     * @param int $id
     * @return Inscricao
     */
    public function findOneById(int $id)
    {
        return $this->findOneBy(['id' => $id]);
    }

    public function findOneByCpfOportunidade(Inscricao $inscricao)
    {
        $entityManager = $this->getEntityManager();

        $dql = "
            SELECT inscricao
            FROM Domain\Model\Inscricao\Inscricao inscricao
            JOIN inscricao.oportunidade oportunidade
            JOIN inscricao.candidato candidato
            WHERE oportunidade.id = :oportunidade AND
             candidato.cpf = :candidato_cpf
        ";

        $query = $entityManager->createQuery($dql)->setMaxResults(1);
        $query->setParameter('candidato_cpf', $inscricao->getCandidato()->getCpf());
        $query->setParameter('oportunidade', $inscricao->getOportunidade()->getId());

        return $query->getOneOrNullResult();
    }

    public function findAllByDadosPesquisa(PesquisarInscricaoDTO $pesquisarInscricaoDTO)
    {
        $entityManager = $this->getEntityManager();
        $parametersDql = [];
        $dql = "
            SELECT
                inscricao
            FROM Domain\Model\Inscricao\Inscricao inscricao
            JOIN inscricao.candidato candidato
            JOIN inscricao.oportunidade oportunidade
            WHERE
        ";

        if ($pesquisarInscricaoDTO->getOportunidade()) {
            $dql .= "oportunidade.id = :oportunidade_id";
            $parametersDql['oportunidade_id'] = $pesquisarInscricaoDTO->getOportunidade()->getId();
        }

        if ($pesquisarInscricaoDTO->getCpf()) {
            $dql .= " AND candidato.cpf = :cpf";
            $parametersDql['cpf'] = $pesquisarInscricaoDTO->getCpf();
        }

        if ($pesquisarInscricaoDTO->getNome()) {
            $dql .= " AND candidato.nome LIKE :nomeCandidato";
            $parametersDql['nomeCandidato'] = '%' . $pesquisarInscricaoDTO->getNome() . '%';
        }

        $dql .= " AND inscricao.ativa = 1";
        $query = $entityManager->createQuery($dql);
        $query->setParameters($parametersDql);

        return $query->getResult();
    }
}