<?php
declare(strict_types=1);

namespace Skora\Config;

use DateTimeImmutable;

interface UrlInterface
{
    public function getLastMod(): ?DateTimeImmutable;

    public function getChangeFreq(): ?ChangeFreq;

    public function getPriority(): ?Priority;

    public function hasLastMod(): bool;

    public function hasChangeFreq(): bool;

    public function hasPriority(): bool;
}
