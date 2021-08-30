<?php


namespace ATCP\MageAcademy\Block;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\View\Element\Template\Context;
use Magento\Store\Model\StoreManagerInterface;

class ImageListBlock extends Template
{
    private $collectionFactory;
    private $storeManager;

    public function __construct(CollectionFactory $collectionFactory, Context $context, StoreManagerInterface $storeManager)
    {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
        $this->storeManager = $storeManager;
    }

    public function getProductCollection()
    {
        $productList = $this->collectionFactory->create();
        $productList->addAttributeToSelect('*');
        $productList->setPageSize(15);
        return $productList;
    }

    public function getImageList()
    {
        $directory = $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        $list = $this->getProductCollection();
        $counter = 1;
        foreach($list as $product) {
            $productImage = $product->getData('image');
            $imageUrl = $directory . 'catalog/product' . $productImage;
            echo sprintf("Product %d : %s<br>", $counter, $imageUrl);
            echo '<img src="'. $imageUrl .'"/>';
            $counter++;
        }
    }
}
