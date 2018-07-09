<?php

namespace Home\PortalBundle\Model\MenuInterface;

interface RestaurantMenuInterface {

    public function getMenu();

    public function getRestaurantId();

    public function getDay();
}