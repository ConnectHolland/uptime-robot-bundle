<?php

declare(strict_types=1);

/*
 * This file is part of the uptime-robot bundle package.
 * (c) Connect Holland.
 */

namespace ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Normalizer;

use Jane\JsonSchemaRuntime\Normalizer\CheckArray;
use Jane\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ResponseTimeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\ResponseTime';
    }

    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\ResponseTime';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\ResponseTime();
        if (\array_key_exists('value', $data) && $data['value'] !== null) {
            $object->setValue($data['value']);
        } elseif (\array_key_exists('value', $data) && $data['value'] === null) {
            $object->setValue(null);
        }
        if (\array_key_exists('datetime', $data) && $data['datetime'] !== null) {
            $object->setDatetime($data['datetime']);
        } elseif (\array_key_exists('datetime', $data) && $data['datetime'] === null) {
            $object->setDatetime(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getValue()) {
            $data['value'] = $object->getValue();
        }
        if (null !== $object->getDatetime()) {
            $data['datetime'] = $object->getDatetime();
        }

        return $data;
    }
}
