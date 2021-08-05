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
        $productList = $this->collectionFactory->create();
        $productList->addAttributeToSelect('*');
        $productList->setPageSize(10);
        return $productList;
    }

    public function execute()
    {
        $toDisplay = array();
        $list = $this->getProductCollection();
        foreach ($list as $product) {
//            $productId = $product->getId();
//            $productName = $product->getName();
            $toDisplay [] = ['id' => $product->getId(), 'name' => $product->getName()];
        }
        return $this->jsonFactory->create()->setJsonData(json_encode($toDisplay, JSON_PRETTY_PRINT));
    }
}
