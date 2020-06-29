<?php

declare(strict_types=1);

/*
 * This file is part of the uptime-robot bundle package.
 * (c) Connect Holland.
 */

namespace ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Endpoint;

class NewAlertContact extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Psr7Endpoint
{
    /**
     * New alert contacts of any type (mobile/SMS alert contacts are not supported yet) can be created using this method. The alert contacts created using the API are validated with the same way as they were created from uptimerobot.com (activation link for e-mails, tc.).
     *
     * @param array $formParameters {
     *
     *     @var string $api_key API key
     *     @var string $format Response format
     *     @var int $type 1 - SMS, 2 - E-mail, 3 - Twitter DM, 4 - Boxcar, 5 - Web-Hook, 6 - Pushbullet, 7 - Zapier, 9 - Pushover, 10 - HipChat, 11 - Slack - he type of the alert contact notified (SMS is not supported yet)
     *     @var string $value address qualifier depending on type, e.g. email address
     *     @var string $friendly_name
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
        return '/newAlertContact';
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
        $optionsResolver->setDefined(['api_key', 'format', 'type', 'value', 'friendly_name']);
        $optionsResolver->setRequired(['value']);
        $optionsResolver->setDefaults(['format' => 'json']);
        $optionsResolver->setAllowedTypes('api_key', ['string']);
        $optionsResolver->setAllowedTypes('format', ['string']);
        $optionsResolver->setAllowedTypes('type', ['int']);
        $optionsResolver->setAllowedTypes('value', ['string']);
        $optionsResolver->setAllowedTypes('friendly_name', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\NewAlertContactBadRequestException
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\NewAlertContactInternalServerErrorException
     *
     * @return \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\AlertContactResponse|null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (200 === $status) {
            return $serializer->deserialize($body, 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\AlertContactResponse', 'json');
        }
        if (400 === $status) {
            throw new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\NewAlertContactBadRequestException();
        }
        if (500 === $status) {
            throw new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\NewAlertContactInternalServerErrorException();
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
