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

class PSPNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\PSP';
    }

    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\PSP';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\PSP();
        if (property_exists($data, 'id') && $data->{'id'} !== null) {
            $object->setId($data->{'id'});
        } elseif (property_exists($data, 'id') && $data->{'id'} === null) {
            $object->setId(null);
        }
        if (property_exists($data, 'friendly_name') && $data->{'friendly_name'} !== null) {
            $object->setFriendlyName($data->{'friendly_name'});
        } elseif (property_exists($data, 'friendly_name') && $data->{'friendly_name'} === null) {
            $object->setFriendlyName(null);
        }
        if (property_exists($data, 'monitors') && $data->{'monitors'} !== null) {
            $object->setMonitors($data->{'monitors'});
        } elseif (property_exists($data, 'monitors') && $data->{'monitors'} === null) {
            $object->setMonitors(null);
        }
        if (property_exists($data, 'sort') && $data->{'sort'} !== null) {
            $object->setSort($data->{'sort'});
        } elseif (property_exists($data, 'sort') && $data->{'sort'} === null) {
            $object->setSort(null);
        }
        if (property_exists($data, 'status') && $data->{'status'} !== null) {
            $object->setStatus($data->{'status'});
        } elseif (property_exists($data, 'status') && $data->{'status'} === null) {
            $object->setStatus(null);
        }
        if (property_exists($data, 'standard_url') && $data->{'standard_url'} !== null) {
            $object->setStandardUrl($data->{'standard_url'});
        } elseif (property_exists($data, 'standard_url') && $data->{'standard_url'} === null) {
            $object->setStandardUrl(null);
        }
        if (property_exists($data, 'custom_url') && $data->{'custom_url'} !== null) {
            $object->setCustomUrl($data->{'custom_url'});
        } elseif (property_exists($data, 'custom_url') && $data->{'custom_url'} === null) {
            $object->setCustomUrl(null);
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
        if (null !== $object->getFriendlyName()) {
            $data->{'friendly_name'} = $object->getFriendlyName();
        } else {
            $data->{'friendly_name'} = null;
        }
        if (null !== $object->getMonitors()) {
            $data->{'monitors'} = $object->getMonitors();
        } else {
            $data->{'monitors'} = null;
        }
        if (null !== $object->getSort()) {
            $data->{'sort'} = $object->getSort();
        } else {
            $data->{'sort'} = null;
        }
        if (null !== $object->getStatus()) {
            $data->{'status'} = $object->getStatus();
        } else {
            $data->{'status'} = null;
        }
        if (null !== $object->getStandardUrl()) {
            $data->{'standard_url'} = $object->getStandardUrl();
        } else {
            $data->{'standard_url'} = null;
        }
        if (null !== $object->getCustomUrl()) {
            $data->{'custom_url'} = $object->getCustomUrl();
        } else {
            $data->{'custom_url'} = null;
        }

        return $data;
    }
}
