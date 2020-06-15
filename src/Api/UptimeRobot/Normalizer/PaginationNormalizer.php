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

class PaginationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\Pagination';
    }

    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\Pagination';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\Pagination();
        if (property_exists($data, 'offset') && $data->{'offset'} !== null) {
            $object->setOffset($data->{'offset'});
        } elseif (property_exists($data, 'offset') && $data->{'offset'} === null) {
            $object->setOffset(null);
        }
        if (property_exists($data, 'limit') && $data->{'limit'} !== null) {
            $object->setLimit($data->{'limit'});
        } elseif (property_exists($data, 'limit') && $data->{'limit'} === null) {
            $object->setLimit(null);
        }
        if (property_exists($data, 'total') && $data->{'total'} !== null) {
            $object->setTotal($data->{'total'});
        } elseif (property_exists($data, 'total') && $data->{'total'} === null) {
            $object->setTotal(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getOffset()) {
            $data->{'offset'} = $object->getOffset();
        } else {
            $data->{'offset'} = null;
        }
        if (null !== $object->getLimit()) {
            $data->{'limit'} = $object->getLimit();
        } else {
            $data->{'limit'} = null;
        }
        if (null !== $object->getTotal()) {
            $data->{'total'} = $object->getTotal();
        } else {
            $data->{'total'} = null;
        }

        return $data;
    }
}
