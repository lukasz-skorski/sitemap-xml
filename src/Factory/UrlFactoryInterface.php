<?php
declare(strict_types=1);

namespace Skora\Factory;

use Skora\Element\ElementInterface;

interface UrlFactoryInterface
{
    public function getLocElement(): ElementInterface;
    public function getChangeFreqElement(): ElementInterface;
    public function getLastModElement(): ElementInterface;
    public function getPriorityElement(): ElementInterface;
    public function getUrlElement(): ElementInterface;
    public function getUrlSetElement(): ElementInterface;
}
