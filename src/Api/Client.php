<?php

declare(strict_types=1);

/*
 * This file is part of the uptime-robot bundle package.
 * (c) Connect Holland.
 */

namespace ConnectHolland\UptimeRobotBundle\Api;

use ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Client as BaseClient;
use Jane\OpenApiRuntime\Client\Psr7Endpoint;

class Client extends BaseClient
{
    private $apiKey = '';

    public function setApiKey(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function executePsr7Endpoint(Psr7Endpoint $endpoint, string $fetch = self::FETCH_OBJECT)
    {
        $endpoint->formParameters = array_merge(
            [
                'api_key' => $this->apiKey,
                'format'  => 'json',
            ],
            $endpoint->formParameters
        );

        return parent::executePsr7Endpoint($endpoint, $fetch);
    }

    public static function createClient($httpClient = null, $apiKey)
    {
        $client = parent::create($httpClient);
        $client->setApiKey($apiKey);

        return $client;
    }
}
