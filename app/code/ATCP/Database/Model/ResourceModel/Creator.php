<?php


namespace ATCP\Database\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Creator extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('vendor_entity', 'vendor_id');
    }
}
