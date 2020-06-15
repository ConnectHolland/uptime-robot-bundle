<?php

declare(strict_types=1);

/*
 * This file is part of the uptime-robot bundle package.
 * (c) Connect Holland.
 */

namespace ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model;

class Account
{
    /**
     * @var string|null
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $email;
    /**
     * @var int|null
     */
    protected $monitorLimit;
    /**
     * @var int|null
     */
    protected $monitorInterval;
    /**
     * @var int|null
     */
    protected $upMonitors;
    /**
     * @var int|null
     */
    protected $downMonitors;
    /**
     * @var int|null
     */
    protected $pausedMonitors;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMonitorLimit(): ?int
    {
        return $this->monitorLimit;
    }

    public function setMonitorLimit(?int $monitorLimit): self
    {
        $this->monitorLimit = $monitorLimit;

        return $this;
    }

    public function getMonitorInterval(): ?int
    {
        return $this->monitorInterval;
    }

    public function setMonitorInterval(?int $monitorInterval): self
    {
        $this->monitorInterval = $monitorInterval;

        return $this;
    }

    public function getUpMonitors(): ?int
    {
        return $this->upMonitors;
    }

    public function setUpMonitors(?int $upMonitors): self
    {
        $this->upMonitors = $upMonitors;

        return $this;
    }

    public function getDownMonitors(): ?int
    {
        return $this->downMonitors;
    }

    public function setDownMonitors(?int $downMonitors): self
    {
        $this->downMonitors = $downMonitors;

        return $this;
    }

    public function getPausedMonitors(): ?int
    {
        return $this->pausedMonitors;
    }

    public function setPausedMonitors(?int $pausedMonitors): self
    {
        $this->pausedMonitors = $pausedMonitors;

        return $this;
    }
}
