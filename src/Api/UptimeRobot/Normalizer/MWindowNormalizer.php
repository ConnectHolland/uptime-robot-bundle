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

class MWindowNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\MWindow';
    }

    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\MWindow';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\MWindow();
        if (property_exists($data, 'id') && $data->{'id'} !== null) {
            $object->setId($data->{'id'});
        } elseif (property_exists($data, 'id') && $data->{'id'} === null) {
            $object->setId(null);
        }
        if (property_exists($data, 'user') && $data->{'user'} !== null) {
            $object->setUser($data->{'user'});
        } elseif (property_exists($data, 'user') && $data->{'user'} === null) {
            $object->setUser(null);
        }
        if (property_exists($data, 'type') && $data->{'type'} !== null) {
            $object->setType($data->{'type'});
        } elseif (property_exists($data, 'type') && $data->{'type'} === null) {
            $object->setType(null);
        }
        if (property_exists($data, 'friendly_name') && $data->{'friendly_name'} !== null) {
            $object->setFriendlyName($data->{'friendly_name'});
        } elseif (property_exists($data, 'friendly_name') && $data->{'friendly_name'} === null) {
            $object->setFriendlyName(null);
        }
        if (property_exists($data, 'start_time') && $data->{'start_time'} !== null) {
            $object->setStartTime($data->{'start_time'});
        } elseif (property_exists($data, 'start_time') && $data->{'start_time'} === null) {
            $object->setStartTime(null);
        }
        if (property_exists($data, 'duration') && $data->{'duration'} !== null) {
            $object->setDuration($data->{'duration'});
        } elseif (property_exists($data, 'duration') && $data->{'duration'} === null) {
            $object->setDuration(null);
        }
        if (property_exists($data, 'value') && $data->{'value'} !== null) {
            $object->setValue($data->{'value'});
        } elseif (property_exists($data, 'value') && $data->{'value'} === null) {
            $object->setValue(null);
        }
        if (property_exists($data, 'status') && $data->{'status'} !== null) {
            $object->setStatus($data->{'status'});
        } elseif (property_exists($data, 'status') && $data->{'status'} === null) {
            $object->setStatus(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getId()) {
            $data->{'id'} = $object->getId();
        } else {
            $data->{'id'} = null;
        }
        if (null !== $object->getUser()) {
            $data->{'user'} = $object->getUser();
        } else {
            $data->{'user'} = null;
        }
        if (null !== $object->getType()) {
            $data->{'type'} = $object->getType();
        } else {
            $data->{'type'} = null;
        }
        if (null !== $object->getFriendlyName()) {
            $data->{'friendly_name'} = $object->getFriendlyName();
        } else {
            $data->{'friendly_name'} = null;
        }
        if (null !== $object->getStartTime()) {
            $data->{'start_time'} = $object->getStartTime();
        } else {
            $data->{'start_time'} = null;
        }
        if (null !== $object->getDuration()) {
            $data->{'duration'} = $object->getDuration();
        } else {
            $data->{'duration'} = null;
        }
        if (null !== $object->getValue()) {
            $data->{'value'} = $object->getValue();
        } else {
            $data->{'value'} = null;
        }
        if (null !== $object->getStatus()) {
            $data->{'status'} = $object->getStatus();
        } else {
            $data->{'status'} = null;
        }

        return $data;
    }
}
