<?php

declare(strict_types=1);

/*
 * This file is part of the uptime-robot bundle package.
 * (c) Connect Holland.
 */

namespace ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model;

class GetMonitorsResponse
{
    /**
     * @var string|null
     */
    protected $stat;
    /**
     * @var Error|null
     */
    protected $error;
    /**
     * @var Pagination|null
     */
    protected $pagination;
    /**
     * @var Monitor[]|null
     */
    protected $monitors;

    public function getStat(): ?string
    {
        return $this->stat;
    }

    public function setStat(?string $stat): self
    {
        $this->stat = $stat;

        return $this;
    }

    public function getError(): ?Error
    {
        return $this->error;
    }

    public function setError(?Error $error): self
    {
        $this->error = $error;

        return $this;
    }

    public function getPagination(): ?Pagination
    {
        return $this->pagination;
    }

    public function setPagination(?Pagination $pagination): self
    {
        $this->pagination = $pagination;

        return $this;
    }

    /**
     * @return Monitor[]|null
     */
    public function getMonitors(): ?array
    {
        return $this->monitors;
    }

    /**
     * @param Monitor[]|null $monitors
     */
    public function setMonitors(?array $monitors): self
    {
        $this->monitors = $monitors;

        return $this;
    }
}
