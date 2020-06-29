<?php

declare(strict_types=1);

/*
 * This file is part of the uptime-robot bundle package.
 * (c) Connect Holland.
 */

namespace ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Normalizer;

use Jane\JsonSchemaRuntime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    protected $normalizers      = ['ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\Error' => 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Normalizer\\ErrorNormalizer', 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\Pagination' => 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Normalizer\\PaginationNormalizer', 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\AccountDetailsResponse' => 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Normalizer\\AccountDetailsResponseNormalizer', 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\Account' => 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Normalizer\\AccountNormalizer', 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\GetMonitorsResponse' => 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Normalizer\\GetMonitorsResponseNormalizer', 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\MonitorResponse' => 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Normalizer\\MonitorResponseNormalizer', 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\Monitor' => 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Normalizer\\MonitorNormalizer', 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\Log' => 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Normalizer\\LogNormalizer', 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\ResponseTime' => 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Normalizer\\ResponseTimeNormalizer', 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\GetAlertContactsResponse' => 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Normalizer\\GetAlertContactsResponseNormalizer', 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\AlertContactResponse' => 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Normalizer\\AlertContactResponseNormalizer', 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\AlertContactUnderscoreResponse' => 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Normalizer\\AlertContactUnderscoreResponseNormalizer', 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\AlertContact' => 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Normalizer\\AlertContactNormalizer', 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\GetMWindowsResponse' => 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Normalizer\\GetMWindowsResponseNormalizer', 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\MWindowResponse' => 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Normalizer\\MWindowResponseNormalizer', 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\MWindow' => 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Normalizer\\MWindowNormalizer', 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\GetPSPsResponse' => 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Normalizer\\GetPSPsResponseNormalizer', 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\PSPResponse' => 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Normalizer\\PSPResponseNormalizer', 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\PSP' => 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Normalizer\\PSPNormalizer', '\\Jane\\JsonSchemaRuntime\\Reference' => '\\Jane\\JsonSchemaRuntime\\Normalizer\\ReferenceNormalizer'];
    protected $normalizersCache = [];

    public function supportsDenormalization($data, $type, $format = null)
    {
        return array_key_exists($type, $this->normalizers);
    }

    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && array_key_exists(get_class($data), $this->normalizers);
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $normalizerClass = $this->normalizers[get_class($object)];
        $normalizer      = $this->getNormalizer($normalizerClass);

        return $normalizer->normalize($object, $format, $context);
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $denormalizerClass = $this->normalizers[$class];
        $denormalizer      = $this->getNormalizer($denormalizerClass);

        return $denormalizer->denormalize($data, $class, $format, $context);
    }

    private function getNormalizer(string $normalizerClass)
    {
        return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
    }

    private function initNormalizer(string $normalizerClass)
    {
        $normalizer = new $normalizerClass();
        $normalizer->setNormalizer($this->normalizer);
        $normalizer->setDenormalizer($this->denormalizer);
        $this->normalizersCache[$normalizerClass] = $normalizer;

        return $normalizer;
    }
}
