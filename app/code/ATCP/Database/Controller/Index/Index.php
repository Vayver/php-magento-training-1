<?php


namespace ATCP\Database\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\View\Result\PageFactory;
use ATCP\Database\Model\CreatorFactory;
use ATCP\Database\Model\ResourceModel\Creator as CategoryResource;

class Index implements ActionInterface
{
    private $pageFactory;
    private $resourceModel;
    private $creatorFactory;

    public function __construct(PageFactory $pageFactory, CategoryResource $resourceModel, CreatorFactory $creatorFactory)
    {
        $this->pageFactory = $pageFactory;
        $this->resourceModel = $resourceModel;
        $this->creatorFactory = $creatorFactory;
    }

    public function execute()
    {
        $model = $this->creatorFactory->create();

        $test1 = 'Testowy name';
        $test2 = 21312;
        $test3 = date('Y-m-d H:i:s');
        $test4 = 'Testowa wiadomosc';

        $dataArray = ['vendor_name' => $test1, 'vendor_code' => $test2, 'upgrade_date' => $test3, 'test' => $test4];

        $model->setData($dataArray);
        $this->resourceModel->save($model);

        return $this->pageFactory->create();
    }
}
