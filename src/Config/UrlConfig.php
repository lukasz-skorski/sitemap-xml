<?php
declare(strict_types=1);

namespace Skora\Config;

use DateTimeImmutable;

class UrlConfig implements UrlInterface
{
    /**
     * @var string
     */
    private $loc;

    /**
     * @var DateTimeImmutable|null
     */
    private $lastMod;

    /**
     * @var ChangeFreq|null
     */
    private $changeFreq;

    /**
     * @var Priority|null
     */
    private $priority;

    public function __construct(
        string $loc,
        ?DateTimeImmutable $lastMod,
        ?ChangeFreq $changeFreq,
        ?Priority $priority
    ) {
        $this->loc = $loc;
        $this->lastMod = $lastMod;
        $this->changeFreq = $changeFreq;
        $this->priority = $priority;
    }

    public function getLoc(): string
    {
        return $this->loc;
    }

    public function getLastMod(): ?DateTimeImmutable
    {
        return $this->lastMod;
    }

    public function getChangeFreq(): ?ChangeFreq
    {
        return $this->changeFreq;
    }

    public function getPriority(): ?Priority
    {
        return $this->priority;
    }

    public function hasLastMod(): bool
    {
        return $this->lastMod !== null;
    }

    public function hasChangeFreq(): bool
    {
        return $this->changeFreq !== null;
    }

    public function hasPriority(): bool
    {
        return $this->priority !== null;
    }
}
