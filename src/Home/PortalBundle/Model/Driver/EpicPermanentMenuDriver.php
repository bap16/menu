<?php

namespace Home\PortalBundle\Model\Driver;

use Symfony\Component\DomCrawler\Crawler;

use Home\PortalBundle\Model\MenuInterface\RestaurantMenuInterface;

class EpicPermanentMenuDriver implements RestaurantMenuInterface
{
    /**
     * @return array
     */
    public function setMenu() {
        $menu = [];
        $url = 'http://epic.co.hu/dohany-utca/etlap/';
        $html = file_get_contents($url);
        $crawler = new Crawler($html);
        $crawler = $crawler->filter('.rp-title-price-wrap');

        $crawler = $crawler->filter('.rp-title-price-wrap');
        $nodeValues = $crawler->each(
            function (Crawler $node, $i) {
                $first = trim($node->children()->first()->text());
                $last = trim($node->children()->last()->text());
                return array($first, $last);
            }
        );
        foreach ($nodeValues as $key => $nodeValue) {
            $menu[$key] = ['name' => $nodeValue[0], 'price' => $nodeValue[1]];
        }
        return $menu;
    }

    /**
     * @return int
     */
    public function setRestaurantId()
    {
        return 1;
    }

    /**
     * @return \DateTime
     */
    public function setDay()
    {
        return new \DateTime('now');
    }
}