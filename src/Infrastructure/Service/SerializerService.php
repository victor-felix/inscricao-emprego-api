<?php

namespace Infrastructure\Service;

use Infrastructure\Exception\SerializerServiceException;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializationContext;

class SerializerService
{
    private $serializer;

    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param $json
     * @param $tipo
     * @return object
     * @throws SerializerServiceException
     */
    public function converter($json, $tipo)
    {
        try {
            return $this->serializer->deserialize($json, $tipo, 'json');
        } catch (Exception $exception) {
            throw new SerializerServiceException();
        }
    }

    public function toJson($data, SerializationContext $context = null)
    {
        return $this->serializer->serialize($data, 'json', $context);
    }

    public function toJsonByGroups($data, array $groups = ['default'])
    {
        return $this->serializer->serialize(
            $data,
            'json',
            SerializationContext::create()->setGroups($groups)
        );
    }
}
