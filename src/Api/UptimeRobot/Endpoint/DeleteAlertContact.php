<?php

declare(strict_types=1);

/*
 * This file is part of the uptime-robot bundle package.
 * (c) Connect Holland.
 */

namespace ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Endpoint;

class DeleteAlertContact extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Endpoint
{
    /**
     * Alert contacts can be deleted using this method.
     *
     * @param array $formParameters {
     *
     *     @var string $api_key API key
     *     @var string $format Response format
     *     @var string $id ID of the alert contact to delete
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
        return '/deleteAlertContact';
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
        $optionsResolver->setDefined(['api_key', 'format', 'id']);
        $optionsResolver->setRequired(['id']);
        $optionsResolver->setDefaults(['format' => 'json']);
        $optionsResolver->setAllowedTypes('api_key', ['string']);
        $optionsResolver->setAllowedTypes('format', ['string']);
        $optionsResolver->setAllowedTypes('id', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\DeleteAlertContactBadRequestException
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\DeleteAlertContactInternalServerErrorException
     *
     * @return \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\AlertContactUnderscoreResponse|null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (200 === $status) {
            return $serializer->deserialize($body, 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\AlertContactUnderscoreResponse', 'json');
        }
        if (400 === $status) {
            throw new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\DeleteAlertContactBadRequestException();
        }
        if (500 === $status) {
            throw new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\DeleteAlertContactInternalServerErrorException();
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
