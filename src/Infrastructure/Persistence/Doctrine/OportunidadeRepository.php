<?php

namespace Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityRepository;
use Domain\Model\Oportunidade\Oportunidade;
use Domain\Model\Oportunidade\OportunidadeRepositoryInterface;

class OportunidadeRepository extends EntityRepository implements OportunidadeRepositoryInterface
{
    /**
     * @param Oportunidade $oportunidade
     */
    public function save(Oportunidade $oportunidade)
    {
        $this->getEntityManager()->persist($oportunidade);
        $this->getEntityManager()->flush();
    }

    /**
     * @return array|mixed
     */
    public function findAllOportunidade()
    {
        return $this->findAll();
    }
}