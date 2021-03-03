<?php
declare(strict_types=1);

namespace Skora\Factory;

use Skora\Element\ChangeFreqXml;
use Skora\Element\ElementInterface;
use Skora\Element\LastModXml;
use Skora\Element\LocXml;
use Skora\Element\PriorityXml;
use Skora\Element\UrlSetXml;
use Skora\Element\UrlXml;

class SitemapXmlFactory implements UrlFactoryInterface
{
    public function getUrlElement(): ElementInterface
    {
        return new UrlXml();
    }

    public function getUrlSetElement(): ElementInterface
    {
        return new UrlSetXml();
    }

    public function getLocElement(): ElementInterface
    {
        return new LocXml();
    }

    public function getChangeFreqElement(): ElementInterface
    {
        return new ChangeFreqXml();
    }

    public function getLastModElement(): ElementInterface
    {
        return new LastModXml();
    }

    public function getPriorityElement(): ElementInterface
    {
        return new PriorityXml();
    }
}
