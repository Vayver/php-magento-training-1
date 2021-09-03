<?php


namespace ATCP\MagentoORM\Block;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Model\CategoryFactory;
use Magento\Store\Model\StoreManager;

class StoreBlock extends Template
{
    private $storeManager;
    private $categoryFactory;

    public function __construct(StoreManager $storeManager,
                                CategoryFactory $categoryFactory,
                                Template\Context $context,
                                array $data = [])
    {
        parent::__construct($context, $data);
        $this->storeManager = $storeManager;
        $this->categoryFactory = $categoryFactory;
    }

    public function getList()
    {
        $allStores = array();
        $catalog = $this->categoryFactory->create();

        foreach($this->storeManager->getStores() as $store) {
            $allStores [] = [
                'storeName' => $store->getName(),
                'rootCategoryName' => $catalog->load($store->getRootCategoryId())->getName()]; //factory
        }
        return $allStores;
    }
}
