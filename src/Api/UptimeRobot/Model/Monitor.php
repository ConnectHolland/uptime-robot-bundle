<?php

declare(strict_types=1);

/*
 * This file is part of the uptime-robot bundle package.
 * (c) Connect Holland.
 */

namespace ConnectHolland\UptimeRobotBundle\Api\UptimeRobot\Model;

class Monitor
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
     * @var string|null
     */
    protected $url;
    /**
     * @var int|null
     */
    protected $type;
    /**
     * @var string|null
     */
    protected $subType;
    /**
     * @var string|null
     */
    protected $keywordType;
    /**
     * @var string|null
     */
    protected $keywordValue;
    /**
     * @var string|null
     */
    protected $httpUsername;
    /**
     * @var string|null
     */
    protected $httpPassword;
    /**
     * @var string|null
     */
    protected $port;
    /**
     * @var int|null
     */
    protected $interval;
    /**
     * @var int|null
     */
    protected $status;
    /**
     * @var int|null
     */
    protected $createDatetime;
    /**
     * @var int|null
     */
    protected $monitorGroup;
    /**
     * @var int|null
     */
    protected $isGroupMain;
    /**
     * @var Log[]|null
     */
    protected $logs;
    /**
     * @var string|null
     */
    protected $customUptimeRatio;
    /**
     * @var string|null
     */
    protected $customUptimeRanges;
    /**
     * @var string|null
     */
    protected $customDownDurations;

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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(?int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSubType(): ?string
    {
        return $this->subType;
    }

    public function setSubType(?string $subType): self
    {
        $this->subType = $subType;

        return $this;
    }

    public function getKeywordType(): ?string
    {
        return $this->keywordType;
    }

    public function setKeywordType(?string $keywordType): self
    {
        $this->keywordType = $keywordType;

        return $this;
    }

    public function getKeywordValue(): ?string
    {
        return $this->keywordValue;
    }

    public function setKeywordValue(?string $keywordValue): self
    {
        $this->keywordValue = $keywordValue;

        return $this;
    }

    public function getHttpUsername(): ?string
    {
        return $this->httpUsername;
    }

    public function setHttpUsername(?string $httpUsername): self
    {
        $this->httpUsername = $httpUsername;

        return $this;
    }

    public function getHttpPassword(): ?string
    {
        return $this->httpPassword;
    }

    public function setHttpPassword(?string $httpPassword): self
    {
        $this->httpPassword = $httpPassword;

        return $this;
    }

    public function getPort(): ?string
    {
        return $this->port;
    }

    public function setPort(?string $port): self
    {
        $this->port = $port;

        return $this;
    }

    public function getInterval(): ?int
    {
        return $this->interval;
    }

    public function setInterval(?int $interval): self
    {
        $this->interval = $interval;

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

    public function getCreateDatetime(): ?int
    {
        return $this->createDatetime;
    }

    public function setCreateDatetime(?int $createDatetime): self
    {
        $this->createDatetime = $createDatetime;

        return $this;
    }

    public function getMonitorGroup(): ?int
    {
        return $this->monitorGroup;
    }

    public function setMonitorGroup(?int $monitorGroup): self
    {
        $this->monitorGroup = $monitorGroup;

        return $this;
    }

    public function getIsGroupMain(): ?int
    {
        return $this->isGroupMain;
    }

    public function setIsGroupMain(?int $isGroupMain): self
    {
        $this->isGroupMain = $isGroupMain;

        return $this;
    }

    /**
     * @return Log[]|null
     */
    public function getLogs(): ?array
    {
        return $this->logs;
    }

    /**
     * @param Log[]|null $logs
     */
    public function setLogs(?array $logs): self
    {
        $this->logs = $logs;

        return $this;
    }

    public function getCustomUptimeRatio(): ?string
    {
        return $this->customUptimeRatio;
    }

    public function setCustomUptimeRatio(?string $customUptimeRatio): self
    {
        $this->customUptimeRatio = $customUptimeRatio;

        return $this;
    }

    public function getCustomUptimeRanges(): ?string
    {
        return $this->customUptimeRanges;
    }

    public function setCustomUptimeRanges(?string $customUptimeRanges): self
    {
        $this->customUptimeRanges = $customUptimeRanges;

        return $this;
    }

    public function getCustomDownDurations(): ?string
    {
        return $this->customDownDurations;
    }

    public function setCustomDownDurations(?string $customDownDurations): self
    {
        $this->customDownDurations = $customDownDurations;

        return $this;
    }
}
