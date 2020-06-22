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

class MonitorNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

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
        if (!is_object($data)) {
            return null;
        }
        $object = new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\Monitor();
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
        if (property_exists($data, 'url') && $data->{'url'} !== null) {
            $object->setUrl($data->{'url'});
        } elseif (property_exists($data, 'url') && $data->{'url'} === null) {
            $object->setUrl(null);
        }
        if (property_exists($data, 'type') && $data->{'type'} !== null) {
            $object->setType($data->{'type'});
        } elseif (property_exists($data, 'type') && $data->{'type'} === null) {
            $object->setType(null);
        }
        if (property_exists($data, 'sub_type') && $data->{'sub_type'} !== null) {
            $object->setSubType($data->{'sub_type'});
        } elseif (property_exists($data, 'sub_type') && $data->{'sub_type'} === null) {
            $object->setSubType(null);
        }
        if (property_exists($data, 'keyword_type') && $data->{'keyword_type'} !== null) {
            $object->setKeywordType($data->{'keyword_type'});
        } elseif (property_exists($data, 'keyword_type') && $data->{'keyword_type'} === null) {
            $object->setKeywordType(null);
        }
        if (property_exists($data, 'keyword_value') && $data->{'keyword_value'} !== null) {
            $object->setKeywordValue($data->{'keyword_value'});
        } elseif (property_exists($data, 'keyword_value') && $data->{'keyword_value'} === null) {
            $object->setKeywordValue(null);
        }
        if (property_exists($data, 'http_username') && $data->{'http_username'} !== null) {
            $object->setHttpUsername($data->{'http_username'});
        } elseif (property_exists($data, 'http_username') && $data->{'http_username'} === null) {
            $object->setHttpUsername(null);
        }
        if (property_exists($data, 'http_password') && $data->{'http_password'} !== null) {
            $object->setHttpPassword($data->{'http_password'});
        } elseif (property_exists($data, 'http_password') && $data->{'http_password'} === null) {
            $object->setHttpPassword(null);
        }
        if (property_exists($data, 'port') && $data->{'port'} !== null) {
            $object->setPort($data->{'port'});
        } elseif (property_exists($data, 'port') && $data->{'port'} === null) {
            $object->setPort(null);
        }
        if (property_exists($data, 'interval') && $data->{'interval'} !== null) {
            $object->setInterval($data->{'interval'});
        } elseif (property_exists($data, 'interval') && $data->{'interval'} === null) {
            $object->setInterval(null);
        }
        if (property_exists($data, 'status') && $data->{'status'} !== null) {
            $object->setStatus($data->{'status'});
        } elseif (property_exists($data, 'status') && $data->{'status'} === null) {
            $object->setStatus(null);
        }
        if (property_exists($data, 'create_datetime') && $data->{'create_datetime'} !== null) {
            $object->setCreateDatetime($data->{'create_datetime'});
        } elseif (property_exists($data, 'create_datetime') && $data->{'create_datetime'} === null) {
            $object->setCreateDatetime(null);
        }
        if (property_exists($data, 'monitor_group') && $data->{'monitor_group'} !== null) {
            $object->setMonitorGroup($data->{'monitor_group'});
        } elseif (property_exists($data, 'monitor_group') && $data->{'monitor_group'} === null) {
            $object->setMonitorGroup(null);
        }
        if (property_exists($data, 'is_group_main') && $data->{'is_group_main'} !== null) {
            $object->setIsGroupMain($data->{'is_group_main'});
        } elseif (property_exists($data, 'is_group_main') && $data->{'is_group_main'} === null) {
            $object->setIsGroupMain(null);
        }
        if (property_exists($data, 'logs') && $data->{'logs'} !== null) {
            $values = [];
            foreach ($data->{'logs'} as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\Log', 'json', $context);
            }
            $object->setLogs($values);
        } elseif (property_exists($data, 'logs') && $data->{'logs'} === null) {
            $object->setLogs(null);
        }
        if (property_exists($data, 'custom_uptime_ratio') && $data->{'custom_uptime_ratio'} !== null) {
            $object->setCustomUptimeRatio($data->{'custom_uptime_ratio'});
        } elseif (property_exists($data, 'custom_uptime_ratio') && $data->{'custom_uptime_ratio'} === null) {
            $object->setCustomUptimeRatio(null);
        }
        if (property_exists($data, 'custom_uptime_ranges') && $data->{'custom_uptime_ranges'} !== null) {
            $object->setCustomUptimeRanges($data->{'custom_uptime_ranges'});
        } elseif (property_exists($data, 'custom_uptime_ranges') && $data->{'custom_uptime_ranges'} === null) {
            $object->setCustomUptimeRanges(null);
        }
        if (property_exists($data, 'custom_down_durations') && $data->{'custom_down_durations'} !== null) {
            $object->setCustomDownDurations($data->{'custom_down_durations'});
        } elseif (property_exists($data, 'custom_down_durations') && $data->{'custom_down_durations'} === null) {
            $object->setCustomDownDurations(null);
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
        if (null !== $object->getUrl()) {
            $data->{'url'} = $object->getUrl();
        } else {
            $data->{'url'} = null;
        }
        if (null !== $object->getType()) {
            $data->{'type'} = $object->getType();
        } else {
            $data->{'type'} = null;
        }
        if (null !== $object->getSubType()) {
            $data->{'sub_type'} = $object->getSubType();
        } else {
            $data->{'sub_type'} = null;
        }
        if (null !== $object->getKeywordType()) {
            $data->{'keyword_type'} = $object->getKeywordType();
        } else {
            $data->{'keyword_type'} = null;
        }
        if (null !== $object->getKeywordValue()) {
            $data->{'keyword_value'} = $object->getKeywordValue();
        } else {
            $data->{'keyword_value'} = null;
        }
        if (null !== $object->getHttpUsername()) {
            $data->{'http_username'} = $object->getHttpUsername();
        } else {
            $data->{'http_username'} = null;
        }
        if (null !== $object->getHttpPassword()) {
            $data->{'http_password'} = $object->getHttpPassword();
        } else {
            $data->{'http_password'} = null;
        }
        if (null !== $object->getPort()) {
            $data->{'port'} = $object->getPort();
        } else {
            $data->{'port'} = null;
        }
        if (null !== $object->getInterval()) {
            $data->{'interval'} = $object->getInterval();
        } else {
            $data->{'interval'} = null;
        }
        if (null !== $object->getStatus()) {
            $data->{'status'} = $object->getStatus();
        } else {
            $data->{'status'} = null;
        }
        if (null !== $object->getCreateDatetime()) {
            $data->{'create_datetime'} = $object->getCreateDatetime();
        } else {
            $data->{'create_datetime'} = null;
        }
        if (null !== $object->getMonitorGroup()) {
            $data->{'monitor_group'} = $object->getMonitorGroup();
        } else {
            $data->{'monitor_group'} = null;
        }
        if (null !== $object->getIsGroupMain()) {
            $data->{'is_group_main'} = $object->getIsGroupMain();
        } else {
            $data->{'is_group_main'} = null;
        }
        if (null !== $object->getLogs()) {
            $values = [];
            foreach ($object->getLogs() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data->{'logs'} = $values;
        } else {
            $data->{'logs'} = null;
        }
        if (null !== $object->getCustomUptimeRatio()) {
            $data->{'custom_uptime_ratio'} = $object->getCustomUptimeRatio();
        } else {
            $data->{'custom_uptime_ratio'} = null;
        }
        if (null !== $object->getCustomUptimeRanges()) {
            $data->{'custom_uptime_ranges'} = $object->getCustomUptimeRanges();
        } else {
            $data->{'custom_uptime_ranges'} = null;
        }
        if (null !== $object->getCustomDownDurations()) {
            $data->{'custom_down_durations'} = $object->getCustomDownDurations();
        } else {
            $data->{'custom_down_durations'} = null;
        }

        return $data;
    }
}
