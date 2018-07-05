<?php

namespace Home\PortalBundle\Model\Driver;

use Symfony\Component\DomCrawler\Crawler;

use Home\PortalBundle\Model\MenuInterface\RestaurantMenuInterface;

class EpicPermanentMenuDriver implements RestaurantMenuInterface
{
    public function getDomData() {
        $url = 'http://epic.co.hu/dohany-utca/etlap/';
        $html = file_get_contents($url);
        $crawler = new Crawler($html);
        $crawler = $crawler->filter('.rp-title-price-wrap');

        $crawler = $crawler->filter('.rp-title-price-wrap');
        $nodeValues = $crawler->each(
            function (Crawler $node, $i) {
                $first = $node->children()->first()->text();
                $last = $node->children()->last()->text();
                return array($first, $last);
            }
        );

        return $nodeValues;
    }

    public function setRestaurantId()
    {
        // TODO: Implement setRestaurantId() method.
    }

    public function setDay()
    {
        // TODO: Implement setDay() method.
    }

    public function setText()
    {
        // TODO: Implement setText() method.
    }
}