<?php


namespace ATCP\Database\Model\ResourceModel\Creator;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init('ATCP\Database\Model\Creator', 'ATCP\Database\Model\ResourceModel\Creator');
    }
}
