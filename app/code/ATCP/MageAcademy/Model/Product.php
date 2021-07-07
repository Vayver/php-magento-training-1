<?php


namespace ATCP\MageAcademy\Model;


class Product extends \Magento\Catalog\Model\Product
{
    public function getPrice()
    {
        $price = $this->getData('price');
        $price += $price * 0.1;
        return $price;
    }

}
