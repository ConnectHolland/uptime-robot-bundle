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

class GetMonitorsResponseNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\GetMonitorsResponse';
    }

    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\GetMonitorsResponse';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\GetMonitorsResponse();
        if (\array_key_exists('stat', $data) && $data['stat'] !== null) {
            $object->setStat($data['stat']);
        } elseif (\array_key_exists('stat', $data) && $data['stat'] === null) {
            $object->setStat(null);
        }
        if (\array_key_exists('error', $data) && $data['error'] !== null) {
            $object->setError($this->denormalizer->denormalize($data['error'], 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\Error', 'json', $context));
        } elseif (\array_key_exists('error', $data) && $data['error'] === null) {
            $object->setError(null);
        }
        if (\array_key_exists('pagination', $data) && $data['pagination'] !== null) {
            $object->setPagination($this->denormalizer->denormalize($data['pagination'], 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\Pagination', 'json', $context));
        } elseif (\array_key_exists('pagination', $data) && $data['pagination'] === null) {
            $object->setPagination(null);
        }
        if (\array_key_exists('monitors', $data) && $data['monitors'] !== null) {
            $values = [];
            foreach ($data['monitors'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\Monitor', 'json', $context);
            }
            $object->setMonitors($values);
        } elseif (\array_key_exists('monitors', $data) && $data['monitors'] === null) {
            $object->setMonitors(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getStat()) {
            $data['stat'] = $object->getStat();
        }
        if (null !== $object->getError()) {
            $data['error'] = $this->normalizer->normalize($object->getError(), 'json', $context);
        }
        if (null !== $object->getPagination()) {
            $data['pagination'] = $this->normalizer->normalize($object->getPagination(), 'json', $context);
        }
        if (null !== $object->getMonitors()) {
            $values = [];
            foreach ($object->getMonitors() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['monitors'] = $values;
        }

        return $data;
    }
}
