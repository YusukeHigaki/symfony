<?php
/**
 * Created by PhpStorm.
 * User: higakiyuusuke
 * Date: 2014/04/29
 * Time: 13:39
 */

namespace Acme\StoreBundle\Entity;

use Symfony¥Component¥Validator¥Constraints as Assert;

class Product
{
    public $name;
    protected $price;

    /**
     * @Assert¥Type(type="Acme¥StoreBundle¥Entity¥Category")
     */
    protected $category;

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory(Category $category)
    {
        $this->category = $category;
    }
}