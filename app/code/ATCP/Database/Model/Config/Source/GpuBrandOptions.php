<?php


namespace ATCP\Database\Model\Config\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class GpuBrandOptions extends AbstractSource
{
    public function getAllOptions(): ?array
    {
        if($this->_options === null)
        {
            $this->_options = [
                ['value' => '', 'label' => 'Select options'],
                ['value' => '1', 'label' => 'ASUS'],
                ['value' => '2', 'label' => 'MSI'],
                ['value' => '3', 'label' => 'Gigabyte'],
                ['value' => '4', 'label' => 'EVGA'],
                ['value' => '5', 'label' => 'ZOTAC'],
                ['value' => '6', 'label' => 'Palit'],
                ['value' => '7', 'label' => 'AMD'],
                ['value' => '8', 'label' => 'Sapphire']
            ];
        }
        return $this->_options;
    }

    public function getOptionValue($value)
    {
        foreach ($this->_options as $option) {
            if($option['value'] == $value)
            {
                return $option['label'];
            }
        }
        return false;
    }
}
