<?php
declare(strict_types=1);

namespace Skora\Element;

use Skora\Config\UrlConfig;
use DOMElement;

class PriorityXml implements ElementInterface
{
    public function createElement(UrlConfig $urlConfig): ?DOMElement
    {
        if ($urlConfig->getPriority() === null) {
            return null;
        }

        return new DOMElement('priority',
            $urlConfig->getPriority()
                      ->getValue()
        );
    }
}
