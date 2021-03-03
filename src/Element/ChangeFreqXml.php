<?php
declare(strict_types=1);

namespace Skora\Element;

use Skora\Config\UrlConfig;
use DOMElement;

class ChangeFreqXml implements ElementInterface
{
    public function createElement(UrlConfig $urlConfig): ?DOMElement
    {
        if ($urlConfig->getChangeFreq() === null) {
            return null;
        }

        return new DOMElement('changefreq', $urlConfig->getChangeFreq()->getValue());
    }
}
