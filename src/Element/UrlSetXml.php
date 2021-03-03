<?php
declare(strict_types=1);

namespace Skora\Element;

use Skora\Config\UrlConfig;
use DOMElement;

class UrlSetXml implements ElementInterface
{
    public function createElement(UrlConfig $urlConfig): ?DOMElement
    {
        $urlSetElement = new DOMElement(
            'urlset'
        );

        $urlSetElement = $urlSetElement->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

        if ($urlSetElement === false) {
            throw new \UndefinedBuildException("Undefined url-set build!");
        }

        return $urlSetElement;
    }
}
