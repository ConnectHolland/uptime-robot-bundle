<?php

declare(strict_types=1);

/*
 * This file is part of the uptime-robot bundle package.
 * (c) Connect Holland.
 */

namespace ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model;

class Log
{
    /**
     * @var string|null
     */
    protected $type;
    /**
     * @var int|null
     */
    protected $datetime;
    /**
     * @var int|null
     */
    protected $duration;

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDatetime(): ?int
    {
        return $this->datetime;
    }

    public function setDatetime(?int $datetime): self
    {
        $this->datetime = $datetime;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }
}
