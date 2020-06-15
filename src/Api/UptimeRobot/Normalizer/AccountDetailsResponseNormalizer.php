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

class AccountDetailsResponseNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\AccountDetailsResponse';
    }

    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\AccountDetailsResponse';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\AccountDetailsResponse();
        if (property_exists($data, 'stat') && $data->{'stat'} !== null) {
            $object->setStat($data->{'stat'});
        } elseif (property_exists($data, 'stat') && $data->{'stat'} === null) {
            $object->setStat(null);
        }
        if (property_exists($data, 'account') && $data->{'account'} !== null) {
            $object->setAccount($this->denormalizer->denormalize($data->{'account'}, 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\Account', 'json', $context));
        } elseif (property_exists($data, 'account') && $data->{'account'} === null) {
            $object->setAccount(null);
        }
        if (property_exists($data, 'error') && $data->{'error'} !== null) {
            $object->setError($this->denormalizer->denormalize($data->{'error'}, 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\Error', 'json', $context));
        } elseif (property_exists($data, 'error') && $data->{'error'} === null) {
            $object->setError(null);
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
        if (null !== $object->getAccount()) {
            $data->{'account'} = $this->normalizer->normalize($object->getAccount(), 'json', $context);
        } else {
            $data->{'account'} = null;
        }
        if (null !== $object->getError()) {
            $data->{'error'} = $this->normalizer->normalize($object->getError(), 'json', $context);
        } else {
            $data->{'error'} = null;
        }

        return $data;
    }
}
