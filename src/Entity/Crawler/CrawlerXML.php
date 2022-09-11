<?php

namespace App\Entity\Crawler;

use Symfony\Component\DomCrawler\Crawler;


class CrawlerXML implements CrawlerXMLInterface
{
    public function create(int $num,string $xml): array
    {
        $crawler = new Crawler($xml);
        $crawler = $crawler->filter('offer');
        $element = [];
        $elementCrawler = $crawler->eq($num)->children();
        foreach ($elementCrawler as $domElement) {
            $element[$domElement->nodeName] = $domElement->nodeValue;
        }
        return $element;
    }

    public function getCountCrawler(string $xml): int
    {
        $crawler = new Crawler($xml);
        $crawler = $crawler->filter('offer');
        return count($crawler);
    }
}