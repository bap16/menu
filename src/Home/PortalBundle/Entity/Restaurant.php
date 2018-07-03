<?php

namespace Home\PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Restaurant
 *
 * @ORM\Table(name="restaurant")
 * @ORM\Entity(repositoryClass="Home\PortalBundle\Repository\RestaurantRepository")
 */
class Restaurant
{
    /**
     * @var string
     *
     * @ORM\Column(name="restaurantTitle", type="string", length=100)
     */
    private $restaurantTitle;

    /**
     * @var int
     *
     * @ORM\Column(name="restaurantId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $restaurantId;

    /**
     * @var string
     *
     * @ORM\Column(name="phoneNumber", type="string", length=100)
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;


    /**
     * Set restaurantTitle
     *
     * @param string $restaurantTitle
     *
     * @return Restaurant
     */
    public function setRestaurantTitle($restaurantTitle)
    {
        $this->restaurantTitle = $restaurantTitle;

        return $this;
    }

    /**
     * Get restaurantTitle
     *
     * @return string
     */
    public function getRestaurantTitle()
    {
        return $this->restaurantTitle;
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
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return Restaurant
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Restaurant
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Restaurant
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}

