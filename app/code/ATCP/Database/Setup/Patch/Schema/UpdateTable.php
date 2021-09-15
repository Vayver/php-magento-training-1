<?php


namespace ATCP\Database\Setup\Patch\Schema;

use Magento\Catalog\Setup\Patch\Data\UpdateMediaAttributesBackendTypes;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpdateTable implements DataPatchInterface, PatchVersionInterface
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

        $update->getConnection()->addColumn('vendor_entity',
            'test',
            [
                'type' => Table::TYPE_TEXT,
                'length' => '255',
                'nullable' => true,
                'comment' => 'test'
            ]);

        $update->endSetup();
    }

    public function getAliases()
    {
        return [];
    }

    public static function getDependencies()
    {
        return [
            UpdateMediaAttributesBackendTypes::class,
        ];
    }

    public static function getVersion()
    {
        return [];
    }
}
