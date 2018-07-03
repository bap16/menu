<?php

namespace Home\PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 *
 * @ORM\Table(name="menu")
 * @ORM\Entity(repositoryClass="Home\PortalBundle\Repository\MenuRepository")
 */
class Menu
{
    /**
     * @var int
     *
     * @ORM\Column(name="restaurantId", type="integer")
     */
    private $restaurantId;

    /**
     * @var string
     *
     * @ORM\Column(name="day", type="string", length=100)
     */
    private $day;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255)
     */
    private $text;

    /**
     * @var int
     *
     * @ORM\Column(name="menuId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $menuId;

    /**
     * Set restaurantId
     *
     * @param integer $restaurantId
     *
     * @return Menu
     */
    public function setRestaurantId($restaurantId)
    {
        $this->restaurantId = $restaurantId;

        return $this;
    }

    /**
     * Get restaurantId
     *
     * @return int
     */
    public function getRestaurantId()
    {
        return $this->restaurantId;
    }

    /**
     * Set day
     *
     * @param string $day
     *
     * @return Menu
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return string
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Menu
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Get menuId
     *
     * @return int
     */
    public function getMenuId()
    {
        return $this->menuId;
    }
}

