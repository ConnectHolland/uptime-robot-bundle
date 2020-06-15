# Connect Holland UptimeRobot Bundle

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ConnectHolland/uptime-robot-bundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ConnectHolland/uptime-robot-bundle/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/ConnectHolland/uptime-robot-bundle/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/ConnectHolland/uptime-robot-bundle/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/ConnectHolland/uptime-robot-bundle/badges/build.png?b=master)](https://scrutinizer-ci.com/g/ConnectHolland/uptime-robot-bundle/build-status/master)

UptimeRobot bundle for Symfony 4/5 projects

## Installation
```bash
composer require connectholland/uptime-robot-bundle
```

## Environment

Set the environment variables to be able to connect to the UptimeRobot API.

```dotenv
UPTIMEROBOT_API_KEY=the-api-key
```

## Usage
Autowire the client, e.g.:

```php
<?php

declare(strict_types=1);

namespace App;

use ConnectHolland\UptimeRobotBundle\Api\Client;

class SomeService
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
    
    public function someMethod()
    {
        $this->client->getMonitors();
    }
}
```

