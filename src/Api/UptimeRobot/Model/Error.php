<?php

declare(strict_types=1);

/*
 * This file is part of the uptime-robot bundle package.
 * (c) Connect Holland.
 */

namespace ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model;

class Error
{
    /**
     * @var string|null
     */
    protected $type;
    /**
     * @var string|null
     */
    protected $message;
    /**
     * @var string|null
     */
    protected $parameterName;

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getParameterName(): ?string
    {
        return $this->parameterName;
    }

    public function setParameterName(?string $parameterName): self
    {
        $this->parameterName = $parameterName;

        return $this;
    }
}
