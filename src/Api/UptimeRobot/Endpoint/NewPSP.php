<?php

declare(strict_types=1);

/*
 * This file is part of the uptime-robot bundle package.
 * (c) Connect Holland.
 */

namespace ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Endpoint;

class NewPSP extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Endpoint
{
    /**
     * New public status pages can be created using this method.
     *
     * @param array $formParameters {
     *
     *     @var string $api_key API key
     *     @var string $format Response format
     *     @var string $friendly_name name of monitor
     *     @var string $monitors required (The monitors to be displayed can be sent as 15830-32696-83920. Or 0 for displaying all monitors)
     *     @var string $custom_domain optinal
     *     @var int $sort required for port monitoring
     *     @var int $hide_url_links optional (for hiding the Uptime Robot links and only available in the Pro Plan)
     *     @var int $status optional
     * }
     */
    public function __construct(array $formParameters = [])
    {
        $this->formParameters = $formParameters;
    }

    use \Jane\OpenApiRuntime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/newPSP';
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
        $optionsResolver->setDefined(['api_key', 'format', 'friendly_name', 'monitors', 'custom_domain', 'sort', 'hide_url_links', 'status']);
        $optionsResolver->setRequired(['friendly_name']);
        $optionsResolver->setDefaults(['format' => 'json']);
        $optionsResolver->setAllowedTypes('api_key', ['string']);
        $optionsResolver->setAllowedTypes('format', ['string']);
        $optionsResolver->setAllowedTypes('friendly_name', ['string']);
        $optionsResolver->setAllowedTypes('monitors', ['string']);
        $optionsResolver->setAllowedTypes('custom_domain', ['string']);
        $optionsResolver->setAllowedTypes('sort', ['int']);
        $optionsResolver->setAllowedTypes('hide_url_links', ['int']);
        $optionsResolver->setAllowedTypes('status', ['int']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\NewPSPBadRequestException
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\NewPSPInternalServerErrorException
     *
     * @return \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\PSPResponse|null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (200 === $status) {
            return $serializer->deserialize($body, 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\PSPResponse', 'json');
        }
        if (400 === $status) {
            throw new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\NewPSPBadRequestException();
        }
        if (500 === $status) {
            throw new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\NewPSPInternalServerErrorException();
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
