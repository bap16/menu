<?php

namespace Home\PortalBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\Response;

use Home\PortalBundle\Entity\Menu;
use Home\PortalBundle\Model\Driver\PastaBellaMenuDriver;
use Home\PortalBundle\Model\Driver\EpicPermanentMenuDriver;
use Home\PortalBundle\Model\Driver\RubenPermanentMenuDriver;

class PortalCrawlerCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('portal:crawler')
            ->setDescription('DomCrawler on restaurants site')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $epicMenu = $this->getEpicMenuDriver()->getMenu();
        $pastaBellaMenu = $this->getPastaBellaMenuDriver()->getMenu();
        $rubenPermanentMenu = $this->getRubenPermanentMenuDriver()->getMenu();

        $menuIdEpic = $this->sendData($this->getEpicMenuDriver()->getDay(), $this->getEpicMenuDriver()->getRestaurantId(), $epicMenu);
        $menuIdPastaBella = $this->sendData($this->getPastaBellaMenuDriver()->getDay(), $this->getPastaBellaMenuDriver()->getRestaurantId(), $pastaBellaMenu);

        return new Response('Saved new menu with id '. $menuIdEpic . ' and ' . $menuIdPastaBella);

        $argument = $input->getArgument('argument');

        if ($input->getOption('option')) {
            // ...
        }

        $output->writeln('Command result.');
    }

    /**
     * @return \Doctrine\Bundle\DoctrineBundle\Registry|object
     */
    protected function getDoctrine() {
        return $this->getContainer()->get('doctrine');
    }

    /**
     * @return EpicPermanentMenuDriver
     */
    protected function getEpicMenuDriver() {
        return new EpicPermanentMenuDriver();
    }

    /**
     * @return PastaBellaMenuDriver
     */
    protected function getPastaBellaMenuDriver() {
        return new PastaBellaMenuDriver();
    }

    /**
     * @return RubenPermanentMenuDriver
     */
    protected function getRubenPermanentMenuDriver()
    {
        return new RubenPermanentMenuDriver();
    }

    /**
     * @param $day
     * @param $restaurantId
     * @param $crawledMenu
     * @return int
     */
    protected function sendData($day, $restaurantId, $crawledMenu) {
        $entityManager = $this->getDoctrine()->getManager();

        $menu = new Menu();
        $menu->setDay($day);
        $menu->setRestaurantId($restaurantId);
        $menu->setText($crawledMenu);

        $entityManager->persist($menu);
        $entityManager->flush();

        return $menu->getMenuId();
    }
}
