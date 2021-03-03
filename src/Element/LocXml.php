<?php
declare(strict_types=1);

namespace Skora\Element;

use Skora\Config\UrlConfig;
use DOMElement;


class LocXml implements ElementInterface
{
    public function createElement(UrlConfig $urlConfig): ?DOMElement
    {
        return new DOMElement('loc', $urlConfig->getLoc());
    }
}
