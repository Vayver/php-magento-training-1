<?php namespace ATCP\Database\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;
use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class InstallData implements DataPatchInterface
{
    private $attributeSetFactory;
    private $categorySetupFactory;
    private $setup;

    public function __construct(ModuleDataSetupInterface $setup,
                                AttributeSetFactory $attributeSetFactory,
                                CategorySetupFactory $categorySetupFactory)
    {
        $this->attributeSetFactory = $attributeSetFactory;
        $this->categorySetupFactory = $categorySetupFactory;
        $this->setup = $setup;
    }

    public function apply()
    {
        $setup = $this->setup;

        $setup->startSetup();

        $categorySetup = $this->categorySetupFactory->create(['setup' => $setup]);
        $attributeSet = $this->attributeSetFactory->create();
        $entityTypeId = $categorySetup->getEntityTypeId(\Magento\Catalog\Model\Product::ENTITY);
        $attributeSetId = $categorySetup->getDefaultAttributeSetId($entityTypeId);
        $data = [
            'attribute_set_name' => 'graphic_card',
            'entity_type_id' => $entityTypeId,
            'sort_order' => 0,
        ];
        $attributeSet->setData($data);
        $attributeSet->validate();
        $attributeSet->save();
        $attributeSet->initFromSkeleton($attributeSetId)->save();
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
