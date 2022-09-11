<?php

namespace App\Entity\Crawler;

interface CrawlerXMLInterface
{
    public function create(int $num,string $xml): array;
    public function getCountCrawler(string $xml): int;
}