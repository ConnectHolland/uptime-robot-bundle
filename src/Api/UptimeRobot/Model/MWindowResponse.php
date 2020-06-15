<?php

declare(strict_types=1);

/*
 * This file is part of the uptime-robot bundle package.
 * (c) Connect Holland.
 */

namespace ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model;

class MWindowResponse
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
     * @var MWindow|null
     */
    protected $mwindow;

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

    public function getMwindow(): ?MWindow
    {
        return $this->mwindow;
    }

    public function setMwindow(?MWindow $mwindow): self
    {
        $this->mwindow = $mwindow;

        return $this;
    }
}
