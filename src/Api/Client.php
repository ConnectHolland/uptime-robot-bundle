<?php

declare(strict_types=1);

/*
 * This file is part of the uptime-robot bundle package.
 * (c) Connect Holland.
 */

namespace ConnectHolland\UptimeRobotBundle\Api;

use ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Client as BaseClient;
use Jane\OpenApiRuntime\Client\Endpoint;

class Client extends BaseClient
{
    private $apiKey = '';

    public function setApiKey(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function executeEndpoint(Endpoint $endpoint, string $fetch = self::FETCH_OBJECT)
    {
        $endpoint->formParameters = array_merge(
            [
                'api_key' => $this->apiKey,
                'format'  => 'json',
            ],
            $endpoint->formParameters
        );

        return parent::executeEndpoint($endpoint, $fetch);
    }

    public static function createClient($httpClient = null, array $additionalPlugins = [], $apiKey)
    {
        $client = parent::create($httpClient, $additionalPlugins);
        $client->setApiKey($apiKey);

        return $client;
    }
}
