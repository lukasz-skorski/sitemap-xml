<?php
declare(strict_types=1);

namespace Skora\Config;

final class Priority
{
    /**
     * @var float
     */
    private $value;

    public function __construct(
        float $value
    ) {
        $this->value = $value;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    private function setValue(float $value): void
    {
        if ($value > 1.0) {
            throw new \InvalidArgumentException(
                "Value should be less or equal 1.0. (https://www.sitemaps.org/pl/protocol.html)"
            );
        }
        if ($value < 0) {
            throw new \InvalidArgumentException(
                "Value should be less or equal 0.0. (https://www.sitemaps.org/pl/protocol.html)"
            );
        }

        $this->value = round($value, 1);
    }
}
