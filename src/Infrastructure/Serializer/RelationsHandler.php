<?php

namespace Infrastructure\Serializer;

use Doctrine\ORM\EntityManager;
use JMS\Serializer\Context;
use JMS\Serializer\JsonDeserializationVisitor;

class RelationsHandler
{

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * RelationsHandler constructor.
     * @param $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function serializeRelations(
        JsonDeserializationVisitor $visitor,
        array $data,
        array $type,
        Context $context
    ) {
        if (!isset($data['id'])) {
            throw new \DomainException('Id não passado por parametro.');
        }

        $entityName = $type["name"];

        $entity = $this->entityManager->getReference($entityName, $data['id']);

        return $entity;
    }

    public function serializeRelationsByParam(
        JsonDeserializationVisitor $visitor,
        array $data,
        array $type,
        Context $context
    ) {
        $entityName = $type["name"];

        return $this->entityManager->getRepository($entityName)->findOneBy($data);
    }
}