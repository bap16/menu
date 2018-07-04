<?php

namespace Home\PortalBundle\Model\MenuInterface;

interface RestaurantMenuInterface {

    public function setRestaurantId();

    public function getRestaurantId();

    public function setDay();

    public function getDay();

    public function setText();

    public function getText();

    public function getMenuId();
}