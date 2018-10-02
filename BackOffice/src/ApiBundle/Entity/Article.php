<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\ArticleRepository")
 * 
 * @Serializer\ExclusionPolicy("all")
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Expose
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * 
     * @Serializer\Expose
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     * 
     * @Serializer\Expose
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="text")
     * 
     * @Serializer\Expose
     */
    private $details;


    /**
     * @var float     
     *
     * @ORM\Column(name="priceht", type="float")
     * 
     * @Serializer\Expose
     */
    private $priceht;

    /**
     * @var float     
     *
     * @ORM\Column(name="pricetc", type="float")
     * 
     * @Serializer\Expose
     */
    private $pricetc;

    /**
     * @var string
     *
     * @ORM\Column(name="orderArticle", type="string", length=255)
     * 
     * @Serializer\Expose
     */
    private $orderArticle;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Article
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Article
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set details
     *
     * @param string $details
     *
     * @return Article
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set priceht
     *
     * @param float $priceht
     *
     * @return Article
     */
    public function setPriceht($priceht)
    {
        $this->priceht = $priceht;

        return $this;
    }

    /**
     * Get priceht
     *
     * @return float
     */
    public function getPriceht()
    {
        return $this->priceht;
    }

    /**
     * Set pricetc
     *
     * @param float $pricetc
     *
     * @return Article
     */
    public function setPricetc($pricetc)
    {
        $this->pricetc = $pricetc;

        return $this;
    }

    /**
     * Get pricetc
     *
     * @return float
     */
    public function getPricetc()
    {
        return $this->pricetc;
    }

    /**
     * Set orderArticle
     *
     * @param string $orderArticle
     *
     * @return Article
     */
    public function setOrderArticle($orderArticle)
    {
        $this->orderArticle = $orderArticle;

        return $this;
    }

    /**
     * Get orderArticle
     *
     * @return string
     */
    public function getOrderArticle()
    {
        return $this->orderArticle;
    }

}

