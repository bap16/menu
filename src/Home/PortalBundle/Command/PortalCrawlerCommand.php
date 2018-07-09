<?php

namespace Home\PortalBundle\Command;

use Home\PortalBundle\Entity\Restaurant;
use Home\PortalBundle\Model\Driver\EpicPermanentMenuDriver;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class PortalCrawlerCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('portal:crawler')
            ->setDescription('...')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $epicMenu = $this->getEpicMenuDriver()->setMenu();
        $entityManager = $this->getDoctrine()->getManager();
        $restaurantDataProvider = $this->getRestaurantDataProvider();
        $dataEpic = $restaurantDataProvider->getDataEpic();
        var_dump($epicMenu);
        die();
        $menu = new Restaurant();
        $menu->setAddress('Etlap');
        $menu->setPhoneNumber('Kedd');
        $menu->setRestaurantTitle(1);
        $menu->setUrl(1);

//        $entityManager->persist($product);
//        $entityManager->find("menu", 1);

        $query = $entityManager->createQuery("SET LOCK MODE TO WAIT 120");
//        $users = $query->getResult();

//        $entityManager->flush();

//        return new Response('Saved new product with id '.$product->getMenuId());

        $argument = $input->getArgument('argument');

        if ($input->getOption('option')) {
            // ...
        }

        $output->writeln('Command result.' . $dataEpic['phoneNumber'] . $dataEpic['address'] . $dataEpic['url']);
//        $output->writeln('Command result.');
    }

    /**
     * @return \Doctrine\Bundle\DoctrineBundle\Registry|object
     */
    protected function getDoctrine() {
        return $this->getContainer()->get('doctrine');
    }

    protected function getEpicMenuDriver() {
        return new EpicPermanentMenuDriver();
    }
}
