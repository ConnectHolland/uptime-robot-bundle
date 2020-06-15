<?php

declare(strict_types=1);

/*
 * This file is part of the uptime-robot bundle package.
 * (c) Connect Holland.
 */

namespace ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Endpoint;

class EditMonitor extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Psr7Endpoint
{
    /**
     * Monitors can be edited using this method. Important: The type of a monitor can not be edited (like changing a HTTP monitor into a Port monitor). For such cases, deleting the monitor and re-creating a new one is advised.
     *
     * @param array $formParameters {
     *
     *     @var string $api_key API key
     *     @var string $format Response format
     *     @var int $id ID of the monitor
     *     @var int $status Status of the monitor (1=resume, 0=pause)
     *     @var string $friendly_name name of monitor
     *     @var string $url URL to monitor
     *     @var int $type type of monitor
     *     @var string $sub_type required for port monitoring
     *     @var int $port required for port monitoring
     *     @var string $keyword_type required for keyword monitoring
     *     @var string $keyword_value required for keyword monitoring
     *     @var int $interval optional (in seconds)
     *     @var string $http_username optional
     *     @var string $http_password optional
     *     @var string $alert_contacts optional (the alert contacts to be notified when the monitor goes up/down.Multiple alert_contact>ids can be sent like alert_contacts=457_0_0-373_5_0-8956_2_3 where alert_contact>ids are seperated with - and threshold + recurrence are seperated with _. For ex: alert_contacts=457_5_0 refers to 457 being the alert_contact>id, 5 being the threshold and 0 being the recurrence. As the threshold and recurrence is only available in the Pro Plan, they are always 0 in the Free Plan)
     *     @var int $mwindows optional (the maintenance windows for the monitor which can be mentioned with their IDs like 345-2986-71)
     * }
     */
    public function __construct(array $formParameters = [])
    {
        $this->formParameters = $formParameters;
    }

    use \Jane\OpenApiRuntime\Client\Psr7EndpointTrait;

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/editMonitor';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return $this->getFormBody();
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getFormOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getFormOptionsResolver();
        $optionsResolver->setDefined(['api_key', 'format', 'id', 'status', 'friendly_name', 'url', 'type', 'sub_type', 'port', 'keyword_type', 'keyword_value', 'interval', 'http_username', 'http_password', 'alert_contacts', 'mwindows']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['format' => 'json', 'type' => 1]);
        $optionsResolver->setAllowedTypes('api_key', ['string']);
        $optionsResolver->setAllowedTypes('format', ['string']);
        $optionsResolver->setAllowedTypes('id', ['int']);
        $optionsResolver->setAllowedTypes('status', ['int']);
        $optionsResolver->setAllowedTypes('friendly_name', ['string']);
        $optionsResolver->setAllowedTypes('url', ['string']);
        $optionsResolver->setAllowedTypes('type', ['int']);
        $optionsResolver->setAllowedTypes('sub_type', ['string']);
        $optionsResolver->setAllowedTypes('port', ['int']);
        $optionsResolver->setAllowedTypes('keyword_type', ['string']);
        $optionsResolver->setAllowedTypes('keyword_value', ['string']);
        $optionsResolver->setAllowedTypes('interval', ['int']);
        $optionsResolver->setAllowedTypes('http_username', ['string']);
        $optionsResolver->setAllowedTypes('http_password', ['string']);
        $optionsResolver->setAllowedTypes('alert_contacts', ['string']);
        $optionsResolver->setAllowedTypes('mwindows', ['int']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\EditMonitorBadRequestException
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\EditMonitorInternalServerErrorException
     *
     * @return \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\MonitorResponse|null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (200 === $status) {
            return $serializer->deserialize($body, 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\MonitorResponse', 'json');
        }
        if (400 === $status) {
            throw new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\EditMonitorBadRequestException();
        }
        if (500 === $status) {
            throw new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\EditMonitorInternalServerErrorException();
        }
    }
}
