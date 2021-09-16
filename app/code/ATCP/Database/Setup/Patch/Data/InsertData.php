<?php


namespace ATCP\Database\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class InsertData implements DataPatchInterface
{
    private $moduleDataSetup;

    public function __construct(ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public function apply()
    {
        $update = $this->moduleDataSetup;
        $update->startSetup();

        $update->getConnection()->insert('vendor_entity',
            [
                'vendor_name' => 'Testowy1',
                'vendor_code' => 123456789,
                'upgrade_date' => date('Y-m-d H:i:s'),
                'test' => 'testowa wiadomosc'
            ]);

        $update->endSetup();
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }
}
