<?php

declare(strict_types=1);

/*
 * This file is part of the uptime-robot bundle package.
 * (c) Connect Holland.
 */

namespace ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Normalizer;

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
        if (!is_object($data)) {
            return null;
        }
        $object = new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\GetMonitorsResponse();
        if (property_exists($data, 'stat') && $data->{'stat'} !== null) {
            $object->setStat($data->{'stat'});
        } elseif (property_exists($data, 'stat') && $data->{'stat'} === null) {
            $object->setStat(null);
        }
        if (property_exists($data, 'error') && $data->{'error'} !== null) {
            $object->setError($this->denormalizer->denormalize($data->{'error'}, 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\Error', 'json', $context));
        } elseif (property_exists($data, 'error') && $data->{'error'} === null) {
            $object->setError(null);
        }
        if (property_exists($data, 'pagination') && $data->{'pagination'} !== null) {
            $object->setPagination($this->denormalizer->denormalize($data->{'pagination'}, 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\Pagination', 'json', $context));
        } elseif (property_exists($data, 'pagination') && $data->{'pagination'} === null) {
            $object->setPagination(null);
        }
        if (property_exists($data, 'monitors') && $data->{'monitors'} !== null) {
            $values = [];
            foreach ($data->{'monitors'} as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\Monitor', 'json', $context);
            }
            $object->setMonitors($values);
        } elseif (property_exists($data, 'monitors') && $data->{'monitors'} === null) {
            $object->setMonitors(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getStat()) {
            $data->{'stat'} = $object->getStat();
        } else {
            $data->{'stat'} = null;
        }
        if (null !== $object->getError()) {
            $data->{'error'} = $this->normalizer->normalize($object->getError(), 'json', $context);
        } else {
            $data->{'error'} = null;
        }
        if (null !== $object->getPagination()) {
            $data->{'pagination'} = $this->normalizer->normalize($object->getPagination(), 'json', $context);
        } else {
            $data->{'pagination'} = null;
        }
        if (null !== $object->getMonitors()) {
            $values = [];
            foreach ($object->getMonitors() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data->{'monitors'} = $values;
        } else {
            $data->{'monitors'} = null;
        }

        return $data;
    }
}
