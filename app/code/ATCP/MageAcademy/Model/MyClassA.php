<?php


namespace ATCP\MageAcademy\Model;


class MyClassA
{
    private $product;

    public function __construct(\Magento\Catalog\Model\Product $product)
    {
            $this->product=$product;
    }

    /**
     * @return \Magento\Catalog\Model\Product
     */
    public function getPrice(): \Magento\Catalog\Model\Product
    {
        $price = $this->product->getData('price');
        $price += $price * 0.1;
        return $price;
    }

}
