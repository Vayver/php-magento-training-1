<?php


namespace ATCP\Database\Model;

use Magento\Framework\Model\AbstractModel;

class Creator extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('ATCP\Database\Model\ResourceModel\Creator');
    }
}
