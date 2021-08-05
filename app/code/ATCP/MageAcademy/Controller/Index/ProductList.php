<?php

namespace ATCP\MageAcademy\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;


class ProductList implements ActionInterface
{
    private $jsonFactory;
    private $product;
    private $collectionFactory;

    public function __construct(JsonFactory $jsonFactory, Product $product, CollectionFactory $collectionFactory)
    {
        $this->jsonFactory = $jsonFactory;
        $this->product = $product;
        $this->collectionFactory = $collectionFactory;
    }

    public function getProductCollection()
    {
        $product_list = $this->collectionFactory->create();
        $product_list->addAttributeToSelect('*');
        $product_list->setPageSize(10);
        return $product_list;
    }

    public function execute()
    {
        $to_display = array();
        $list = $this->getProductCollection();
        foreach ($list as $product) {
//            $product_id = $product->getId();
//            $product_name = $product->getName();
            $to_display [] = ['id' => $product->getId(), 'name' => $product->getName()];
        }
        return $this->jsonFactory->create()->setJsonData(json_encode($to_display, JSON_PRETTY_PRINT));
    }
}
