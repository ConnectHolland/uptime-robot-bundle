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

class AccountNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;

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
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\Account();
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        } elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('email', $data) && $data['email'] !== null) {
            $object->setEmail($data['email']);
        } elseif (\array_key_exists('email', $data) && $data['email'] === null) {
            $object->setEmail(null);
        }
        if (\array_key_exists('monitor_limit', $data) && $data['monitor_limit'] !== null) {
            $object->setMonitorLimit($data['monitor_limit']);
        } elseif (\array_key_exists('monitor_limit', $data) && $data['monitor_limit'] === null) {
            $object->setMonitorLimit(null);
        }
        if (\array_key_exists('monitor_interval', $data) && $data['monitor_interval'] !== null) {
            $object->setMonitorInterval($data['monitor_interval']);
        } elseif (\array_key_exists('monitor_interval', $data) && $data['monitor_interval'] === null) {
            $object->setMonitorInterval(null);
        }
        if (\array_key_exists('up_monitors', $data) && $data['up_monitors'] !== null) {
            $object->setUpMonitors($data['up_monitors']);
        } elseif (\array_key_exists('up_monitors', $data) && $data['up_monitors'] === null) {
            $object->setUpMonitors(null);
        }
        if (\array_key_exists('down_monitors', $data) && $data['down_monitors'] !== null) {
            $object->setDownMonitors($data['down_monitors']);
        } elseif (\array_key_exists('down_monitors', $data) && $data['down_monitors'] === null) {
            $object->setDownMonitors(null);
        }
        if (\array_key_exists('paused_monitors', $data) && $data['paused_monitors'] !== null) {
            $object->setPausedMonitors($data['paused_monitors']);
        } elseif (\array_key_exists('paused_monitors', $data) && $data['paused_monitors'] === null) {
            $object->setPausedMonitors(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getId()) {
            $data['id'] = $object->getId();
        }
        if (null !== $object->getEmail()) {
            $data['email'] = $object->getEmail();
        }
        if (null !== $object->getMonitorLimit()) {
            $data['monitor_limit'] = $object->getMonitorLimit();
        }
        if (null !== $object->getMonitorInterval()) {
            $data['monitor_interval'] = $object->getMonitorInterval();
        }
        if (null !== $object->getUpMonitors()) {
            $data['up_monitors'] = $object->getUpMonitors();
        }
        if (null !== $object->getDownMonitors()) {
            $data['down_monitors'] = $object->getDownMonitors();
        }
        if (null !== $object->getPausedMonitors()) {
            $data['paused_monitors'] = $object->getPausedMonitors();
        }

        return $data;
    }
}
