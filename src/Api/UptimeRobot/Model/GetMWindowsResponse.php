<?php

declare(strict_types=1);

/*
 * This file is part of the uptime-robot bundle package.
 * (c) Connect Holland.
 */

namespace ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model;

class GetMWindowsResponse
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
     * @var MWindow[]|null
     */
    protected $mwindows;

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
     * @return MWindow[]|null
     */
    public function getMwindows(): ?array
    {
        return $this->mwindows;
    }

    /**
     * @param MWindow[]|null $mwindows
     */
    public function setMwindows(?array $mwindows): self
    {
        $this->mwindows = $mwindows;

        return $this;
    }
}
