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
        $this->storeManager = $storeManager;
        parent::__construct($context);
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
        $allImages = array();
        $directory = $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        $list = $this->getProductCollection();
        foreach($list as $product) {
            $productImage = $product->getData('image');
            $allImages [] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'imageUrl' => $directory . 'catalog/product' . $productImage];
        }
        return $allImages;
    }
}
