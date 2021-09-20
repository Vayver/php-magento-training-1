<?php


namespace ATCP\Database\Model\Config\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class GpuArchitectureOptions extends AbstractSource
{
    public function getAllOptions(): ?array
    {
        if($this->_options === null)
        {
            $this->_options = [
                ['value' => '', 'label' => 'Select options'],
                ['value' => '1', 'label' => 'Tesla 1'],
                ['value' => '2', 'label' => 'Tesla 2'],
                ['value' => '3', 'label' => 'Fermi'],
                ['value' => '4', 'label' => 'Fermi 2'],
                ['value' => '5', 'label' => 'Kepler 2']
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
