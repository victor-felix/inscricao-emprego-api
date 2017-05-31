<?php

namespace Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityRepository;
use Domain\Model\Inscricao\Inscricao;
use Domain\Model\Inscricao\InscricaoRepositoryInterface;

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
}