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

class AccountNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\Account';
    }

    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\Account';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        $object = new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\Account();
        if (property_exists($data, 'id') && $data->{'id'} !== null) {
            $object->setId($data->{'id'});
        } elseif (property_exists($data, 'id') && $data->{'id'} === null) {
            $object->setId(null);
        }
        if (property_exists($data, 'email') && $data->{'email'} !== null) {
            $object->setEmail($data->{'email'});
        } elseif (property_exists($data, 'email') && $data->{'email'} === null) {
            $object->setEmail(null);
        }
        if (property_exists($data, 'monitor_limit') && $data->{'monitor_limit'} !== null) {
            $object->setMonitorLimit($data->{'monitor_limit'});
        } elseif (property_exists($data, 'monitor_limit') && $data->{'monitor_limit'} === null) {
            $object->setMonitorLimit(null);
        }
        if (property_exists($data, 'monitor_interval') && $data->{'monitor_interval'} !== null) {
            $object->setMonitorInterval($data->{'monitor_interval'});
        } elseif (property_exists($data, 'monitor_interval') && $data->{'monitor_interval'} === null) {
            $object->setMonitorInterval(null);
        }
        if (property_exists($data, 'up_monitors') && $data->{'up_monitors'} !== null) {
            $object->setUpMonitors($data->{'up_monitors'});
        } elseif (property_exists($data, 'up_monitors') && $data->{'up_monitors'} === null) {
            $object->setUpMonitors(null);
        }
        if (property_exists($data, 'down_monitors') && $data->{'down_monitors'} !== null) {
            $object->setDownMonitors($data->{'down_monitors'});
        } elseif (property_exists($data, 'down_monitors') && $data->{'down_monitors'} === null) {
            $object->setDownMonitors(null);
        }
        if (property_exists($data, 'paused_monitors') && $data->{'paused_monitors'} !== null) {
            $object->setPausedMonitors($data->{'paused_monitors'});
        } elseif (property_exists($data, 'paused_monitors') && $data->{'paused_monitors'} === null) {
            $object->setPausedMonitors(null);
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
        if (null !== $object->getEmail()) {
            $data->{'email'} = $object->getEmail();
        } else {
            $data->{'email'} = null;
        }
        if (null !== $object->getMonitorLimit()) {
            $data->{'monitor_limit'} = $object->getMonitorLimit();
        } else {
            $data->{'monitor_limit'} = null;
        }
        if (null !== $object->getMonitorInterval()) {
            $data->{'monitor_interval'} = $object->getMonitorInterval();
        } else {
            $data->{'monitor_interval'} = null;
        }
        if (null !== $object->getUpMonitors()) {
            $data->{'up_monitors'} = $object->getUpMonitors();
        } else {
            $data->{'up_monitors'} = null;
        }
        if (null !== $object->getDownMonitors()) {
            $data->{'down_monitors'} = $object->getDownMonitors();
        } else {
            $data->{'down_monitors'} = null;
        }
        if (null !== $object->getPausedMonitors()) {
            $data->{'paused_monitors'} = $object->getPausedMonitors();
        } else {
            $data->{'paused_monitors'} = null;
        }

        return $data;
    }
}
