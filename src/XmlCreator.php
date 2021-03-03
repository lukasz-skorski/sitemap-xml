<?php
declare(strict_types=1);

namespace Skora;

use Skora\Config\UrlConfig;
use Skora\Element\ElementInterface;
use Skora\Factory\SitemapXmlFactory;
use DOMDocument;
use DOMElement;
use Exception;


class XmlCreator
{
    const VERSION  = "1.0";
    const ENCODING = "UTF-8";

    /**
     * @var resource
     */
    private $file;

    /**
     * @var DOMDocument
     */
    private $xml;

    /**
     * @var DOMDocument
     */
    private $urlSet;

    /**
     * @var ElementInterface
     */
    private $locElementXml;

    /**
     * @var ElementInterface
     */
    private $changeFreqElementXml;

    /**
     * @var ElementInterface
     */
    private $lastModElementXml;

    /**
     * @var ElementInterface
     */
    private $priorityElementXml;

    /**
     * @var ElementInterface
     */
    private $urlElementXml;

    /**
     * @var ElementInterface
     */
    private $urlSetElementXml;

    public function __construct(
        SitemapXmlFactory $sitemapXmlFactory
    ) {
        $this->locElementXml = $sitemapXmlFactory->getLocElement();
        $this->changeFreqElementXml = $sitemapXmlFactory->getChangeFreqElement();
        $this->lastModElementXml = $sitemapXmlFactory->getLastModElement();
        $this->priorityElementXml = $sitemapXmlFactory->getPriorityElement();
        $this->urlElementXml = $sitemapXmlFactory->getUrlElement();
        $this->urlSetElementXml = $sitemapXmlFactory->getUrlSetElement();
    }

    public function create(string $filePath): void
    {
        $this->file = fopen(
            $filePath,
            'w+'
        );

        $this->xml = new DOMDocument(self::VERSION, self::ENCODING);

        $urlSetElement = new DOMElement(
            'urlset'
        );

        $this->urlSet = $urlSetElement->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        if ($this->urlSet === false) {
            throw new Exception("Undefined url-set build error!");
        }
        $this->xml->appendChild($urlSetElement);
    }

    public function close(): void
    {
        fwrite($this->file, $this->xml->textContent);
        fclose($this->file);
    }

    private function addUrl(
        UrlConfig $urlConfig
    ): void {
        /** @var DOMElement $url */
        $url = $this->urlElementXml->createElement($urlConfig);

        /** @var DOMElement $loc */
        $loc = $this->locElementXml->createElement($urlConfig);
        $url->appendChild($loc);
        $lasmod = $this->lastModElementXml->createElement($urlConfig);
        if ($lasmod !== null) {
            $url->appendChild($lasmod);
        }
        $changefreq = $this->changeFreqElementXml->createElement($urlConfig);
        if ($changefreq !== null) {
            $url->appendChild($changefreq);
        }
        $priority = $this - $this->priorityElementXml->createElement($urlConfig);
        if ($priority !== null) {
            $url->appendChild($priority);
        }
        $this->urlSet->appendChild($url);
    }
}
