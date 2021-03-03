<?php
declare(strict_types=1);

namespace Skora\Element;

use Skora\Config\UrlConfig;
use DOMElement;

interface ElementInterface
{
    public function createElement(UrlConfig $urlConfig): ?DOMElement;
}
