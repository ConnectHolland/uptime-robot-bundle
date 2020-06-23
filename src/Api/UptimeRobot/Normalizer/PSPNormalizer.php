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

class PSPNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;

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
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\PSP();
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        } elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('friendly_name', $data) && $data['friendly_name'] !== null) {
            $object->setFriendlyName($data['friendly_name']);
        } elseif (\array_key_exists('friendly_name', $data) && $data['friendly_name'] === null) {
            $object->setFriendlyName(null);
        }
        if (\array_key_exists('monitors', $data) && $data['monitors'] !== null) {
            $object->setMonitors($data['monitors']);
        } elseif (\array_key_exists('monitors', $data) && $data['monitors'] === null) {
            $object->setMonitors(null);
        }
        if (\array_key_exists('sort', $data) && $data['sort'] !== null) {
            $object->setSort($data['sort']);
        } elseif (\array_key_exists('sort', $data) && $data['sort'] === null) {
            $object->setSort(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        } elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('standard_url', $data) && $data['standard_url'] !== null) {
            $object->setStandardUrl($data['standard_url']);
        } elseif (\array_key_exists('standard_url', $data) && $data['standard_url'] === null) {
            $object->setStandardUrl(null);
        }
        if (\array_key_exists('custom_url', $data) && $data['custom_url'] !== null) {
            $object->setCustomUrl($data['custom_url']);
        } elseif (\array_key_exists('custom_url', $data) && $data['custom_url'] === null) {
            $object->setCustomUrl(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getId()) {
            $data['id'] = $object->getId();
        }
        if (null !== $object->getFriendlyName()) {
            $data['friendly_name'] = $object->getFriendlyName();
        }
        if (null !== $object->getMonitors()) {
            $data['monitors'] = $object->getMonitors();
        }
        if (null !== $object->getSort()) {
            $data['sort'] = $object->getSort();
        }
        if (null !== $object->getStatus()) {
            $data['status'] = $object->getStatus();
        }
        if (null !== $object->getStandardUrl()) {
            $data['standard_url'] = $object->getStandardUrl();
        }
        if (null !== $object->getCustomUrl()) {
            $data['custom_url'] = $object->getCustomUrl();
        }

        return $data;
    }
}
