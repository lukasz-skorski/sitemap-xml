<?php
declare(strict_types=1);

namespace Skora\Config;

final class ChangeFreq
{
    const ALWAYS  = 'always';
    const HOURLY  = 'hourly';
    const DAILY   = 'daily';
    const WEEKLY  = 'weekly';
    const MONTHLY = 'monthly';
    const YEARLY  = 'yearly';
    const NEVER   = 'never';

    /**
     * @var string
     */
    private $value;

    const VALUE_ARRAY
        = [
            self::ALWAYS,
            self::HOURLY,
            self::DAILY,
            self::WEEKLY,
            self::MONTHLY,
            self::YEARLY,
            self::NEVER,
        ];

    public function __construct(
        string $value = self::YEARLY
    ) {
        $this->setValue($value);
    }

    private function setValue(string $value): void
    {
        if (! in_array($value, self::VALUE_ARRAY)) {
            throw new \InvalidArgumentException("Invalid value!");
        }
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
