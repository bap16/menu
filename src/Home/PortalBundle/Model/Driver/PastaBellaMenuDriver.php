<?php

namespace Home\PortalBundle\Model\Driver;

use Symfony\Component\DomCrawler\Crawler;

use Home\PortalBundle\Model\MenuInterface\RestaurantMenuInterface;

class PastaBellaMenuDriver implements RestaurantMenuInterface
{
    /**
     * @return array
     */
    public function getMenu() {
        $menu = [];
        $url = 'http://www.pastabella.hu/etlap/index.php';
        $html = file_get_contents($url);
        $crawler = new Crawler($html);

        $crawler = $crawler->filter('.isoboxinner');
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
    public function getRestaurantId()
    {
        return 1;
    }

    /**
     * @return string
     */
    public function getDay()
    {
        $date = new \DateTime('now');
        $result = $date->format('Y-m-d H:i:s');

        if ($result) {
            return $result;
        } else {
            return "Unknown Time";
        }
    }
}