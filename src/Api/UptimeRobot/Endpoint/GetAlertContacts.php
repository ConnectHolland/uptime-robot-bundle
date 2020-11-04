<?php

declare(strict_types=1);

/*
 * This file is part of the uptime-robot bundle package.
 * (c) Connect Holland.
 */

namespace ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Endpoint;

class GetAlertContacts extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Endpoint
{
    /**
     * The list of alert contacts can be called with this method.
     *
     * @param array $formParameters {
     *
     *     @var string $api_key API key
     *     @var string $format Response format
     *     @var string $alertcontacts if not used, will return all alert contacts in an account. Else, it is possible to define any number of alert contacts with their IDs like: alertcontacts=236-1782-4790
     *     @var int $offset used for pagination. Defines the record to start paginating. Default is 0
     *     @var int $limit used for pagination. Defines the max number of records to return for the response. Default and max. is 50
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
        return '/getAlertContacts';
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
        $optionsResolver->setDefined(['api_key', 'format', 'alertcontacts', 'offset', 'limit']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['format' => 'json']);
        $optionsResolver->setAllowedTypes('api_key', ['string']);
        $optionsResolver->setAllowedTypes('format', ['string']);
        $optionsResolver->setAllowedTypes('alertcontacts', ['string']);
        $optionsResolver->setAllowedTypes('offset', ['int']);
        $optionsResolver->setAllowedTypes('limit', ['int']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\GetAlertContactsBadRequestException
     * @throws \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\GetAlertContactsInternalServerErrorException
     *
     * @return \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model\GetAlertContactsResponse|null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (200 === $status) {
            return $serializer->deserialize($body, 'ConnectHolland\\UptimeRobotBundle\\Api\\UptimeRobot\\Model\\GetAlertContactsResponse', 'json');
        }
        if (400 === $status) {
            throw new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\GetAlertContactsBadRequestException();
        }
        if (500 === $status) {
            throw new \ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Exception\GetAlertContactsInternalServerErrorException();
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
