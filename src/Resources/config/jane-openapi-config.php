<?php

declare(strict_types=1);

/*
 * This file is part of the uptime-robot bundle package.
 * (c) Connect Holland.
 */

return [
    'openapi-file'      => __DIR__.'/schema.json',
    'namespace'         => 'ConnectHolland\UptimeRobotBundle\Api\UptimeRobot',
    'directory'         => __DIR__.'/../../Api/UptimeRobot',
    'strict'            => false,
    'clean-generated'   => true,
    'use-fixer'         => true,
    'fixer-config-file' => __DIR__.'/../../../.php_cs.dist',
];
