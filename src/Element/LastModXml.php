<?php
declare(strict_types=1);

namespace Skora\Element;

use Skora\Config\UrlConfig;
use DOMElement;

class LastModXml implements ElementInterface
{
    public function createElement(UrlConfig $urlConfig): ?DOMElement
    {
        if ($urlConfig->getLastMod() === null) {
            return null;
        }

        return new DOMElement(
            'lastmod',
            $urlConfig
                ->getLastMod()
                ->format('Y-m-d')
        );
    }
}
