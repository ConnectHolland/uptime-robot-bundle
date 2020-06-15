<?php

declare(strict_types=1);

/*
 * This file is part of the uptime-robot bundle package.
 * (c) Connect Holland.
 */

namespace ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model;

class PSP
{
    /**
     * @var int|null
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $friendlyName;
    /**
     * @var int|null
     */
    protected $monitors;
    /**
     * @var int|null
     */
    protected $sort;
    /**
     * @var int|null
     */
    protected $status;
    /**
     * @var string|null
     */
    protected $standardUrl;
    /**
     * @var string|null
     */
    protected $customUrl;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getFriendlyName(): ?string
    {
        return $this->friendlyName;
    }

    public function setFriendlyName(?string $friendlyName): self
    {
        $this->friendlyName = $friendlyName;

        return $this;
    }

    public function getMonitors(): ?int
    {
        return $this->monitors;
    }

    public function setMonitors(?int $monitors): self
    {
        $this->monitors = $monitors;

        return $this;
    }

    public function getSort(): ?int
    {
        return $this->sort;
    }

    public function setSort(?int $sort): self
    {
        $this->sort = $sort;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(?int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getStandardUrl(): ?string
    {
        return $this->standardUrl;
    }

    public function setStandardUrl(?string $standardUrl): self
    {
        $this->standardUrl = $standardUrl;

        return $this;
    }

    public function getCustomUrl(): ?string
    {
        return $this->customUrl;
    }

    public function setCustomUrl(?string $customUrl): self
    {
        $this->customUrl = $customUrl;

        return $this;
    }
}
