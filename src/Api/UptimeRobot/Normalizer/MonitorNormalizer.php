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

class MonitorNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\Monitor';
    }

    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\Monitor';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\Monitor();
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
        if (\array_key_exists('url', $data) && $data['url'] !== null) {
            $object->setUrl($data['url']);
        } elseif (\array_key_exists('url', $data) && $data['url'] === null) {
            $object->setUrl(null);
        }
        if (\array_key_exists('type', $data) && $data['type'] !== null) {
            $object->setType($data['type']);
        } elseif (\array_key_exists('type', $data) && $data['type'] === null) {
            $object->setType(null);
        }
        if (\array_key_exists('sub_type', $data) && $data['sub_type'] !== null) {
            $object->setSubType($data['sub_type']);
        } elseif (\array_key_exists('sub_type', $data) && $data['sub_type'] === null) {
            $object->setSubType(null);
        }
        if (\array_key_exists('keyword_type', $data) && $data['keyword_type'] !== null) {
            $object->setKeywordType($data['keyword_type']);
        } elseif (\array_key_exists('keyword_type', $data) && $data['keyword_type'] === null) {
            $object->setKeywordType(null);
        }
        if (\array_key_exists('keyword_value', $data) && $data['keyword_value'] !== null) {
            $object->setKeywordValue($data['keyword_value']);
        } elseif (\array_key_exists('keyword_value', $data) && $data['keyword_value'] === null) {
            $object->setKeywordValue(null);
        }
        if (\array_key_exists('http_username', $data) && $data['http_username'] !== null) {
            $object->setHttpUsername($data['http_username']);
        } elseif (\array_key_exists('http_username', $data) && $data['http_username'] === null) {
            $object->setHttpUsername(null);
        }
        if (\array_key_exists('http_password', $data) && $data['http_password'] !== null) {
            $object->setHttpPassword($data['http_password']);
        } elseif (\array_key_exists('http_password', $data) && $data['http_password'] === null) {
            $object->setHttpPassword(null);
        }
        if (\array_key_exists('port', $data) && $data['port'] !== null) {
            $object->setPort($data['port']);
        } elseif (\array_key_exists('port', $data) && $data['port'] === null) {
            $object->setPort(null);
        }
        if (\array_key_exists('interval', $data) && $data['interval'] !== null) {
            $object->setInterval($data['interval']);
        } elseif (\array_key_exists('interval', $data) && $data['interval'] === null) {
            $object->setInterval(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        } elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('create_datetime', $data) && $data['create_datetime'] !== null) {
            $object->setCreateDatetime($data['create_datetime']);
        } elseif (\array_key_exists('create_datetime', $data) && $data['create_datetime'] === null) {
            $object->setCreateDatetime(null);
        }
        if (\array_key_exists('monitor_group', $data) && $data['monitor_group'] !== null) {
            $object->setMonitorGroup($data['monitor_group']);
        } elseif (\array_key_exists('monitor_group', $data) && $data['monitor_group'] === null) {
            $object->setMonitorGroup(null);
        }
        if (\array_key_exists('is_group_main', $data) && $data['is_group_main'] !== null) {
            $object->setIsGroupMain($data['is_group_main']);
        } elseif (\array_key_exists('is_group_main', $data) && $data['is_group_main'] === null) {
            $object->setIsGroupMain(null);
        }
        if (\array_key_exists('logs', $data) && $data['logs'] !== null) {
            $values = [];
            foreach ($data['logs'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\Log', 'json', $context);
            }
            $object->setLogs($values);
        } elseif (\array_key_exists('logs', $data) && $data['logs'] === null) {
            $object->setLogs(null);
        }
        if (\array_key_exists('custom_uptime_ratio', $data) && $data['custom_uptime_ratio'] !== null) {
            $object->setCustomUptimeRatio($data['custom_uptime_ratio']);
        } elseif (\array_key_exists('custom_uptime_ratio', $data) && $data['custom_uptime_ratio'] === null) {
            $object->setCustomUptimeRatio(null);
        }
        if (\array_key_exists('custom_uptime_ranges', $data) && $data['custom_uptime_ranges'] !== null) {
            $object->setCustomUptimeRanges($data['custom_uptime_ranges']);
        } elseif (\array_key_exists('custom_uptime_ranges', $data) && $data['custom_uptime_ranges'] === null) {
            $object->setCustomUptimeRanges(null);
        }
        if (\array_key_exists('custom_down_durations', $data) && $data['custom_down_durations'] !== null) {
            $object->setCustomDownDurations($data['custom_down_durations']);
        } elseif (\array_key_exists('custom_down_durations', $data) && $data['custom_down_durations'] === null) {
            $object->setCustomDownDurations(null);
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
        if (null !== $object->getUrl()) {
            $data['url'] = $object->getUrl();
        }
        if (null !== $object->getType()) {
            $data['type'] = $object->getType();
        }
        if (null !== $object->getSubType()) {
            $data['sub_type'] = $object->getSubType();
        }
        if (null !== $object->getKeywordType()) {
            $data['keyword_type'] = $object->getKeywordType();
        }
        if (null !== $object->getKeywordValue()) {
            $data['keyword_value'] = $object->getKeywordValue();
        }
        if (null !== $object->getHttpUsername()) {
            $data['http_username'] = $object->getHttpUsername();
        }
        if (null !== $object->getHttpPassword()) {
            $data['http_password'] = $object->getHttpPassword();
        }
        if (null !== $object->getPort()) {
            $data['port'] = $object->getPort();
        }
        if (null !== $object->getInterval()) {
            $data['interval'] = $object->getInterval();
        }
        if (null !== $object->getStatus()) {
            $data['status'] = $object->getStatus();
        }
        if (null !== $object->getCreateDatetime()) {
            $data['create_datetime'] = $object->getCreateDatetime();
        }
        if (null !== $object->getMonitorGroup()) {
            $data['monitor_group'] = $object->getMonitorGroup();
        }
        if (null !== $object->getIsGroupMain()) {
            $data['is_group_main'] = $object->getIsGroupMain();
        }
        if (null !== $object->getLogs()) {
            $values = [];
            foreach ($object->getLogs() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['logs'] = $values;
        }
        if (null !== $object->getCustomUptimeRatio()) {
            $data['custom_uptime_ratio'] = $object->getCustomUptimeRatio();
        }
        if (null !== $object->getCustomUptimeRanges()) {
            $data['custom_uptime_ranges'] = $object->getCustomUptimeRanges();
        }
        if (null !== $object->getCustomDownDurations()) {
            $data['custom_down_durations'] = $object->getCustomDownDurations();
        }

        return $data;
    }
}
