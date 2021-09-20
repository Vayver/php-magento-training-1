<?php namespace ATCP\Database\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;
use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;

class InstallData implements DataPatchInterface
{
    private $attributeSetFactory;
    private $categorySetupFactory;
    private $setup;
    private $eavSetupFactory;

    public function __construct(ModuleDataSetupInterface $setup,
                                AttributeSetFactory $attributeSetFactory,
                                CategorySetupFactory $categorySetupFactory,
                                EavSetupFactory $eavSetupFactory)
    {
        $this->attributeSetFactory = $attributeSetFactory;
        $this->categorySetupFactory = $categorySetupFactory;
        $this->setup = $setup;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function apply()
    {
        $setup = $this->setup;

        $setup->startSetup();

        $categorySetup = $this->categorySetupFactory->create(['setup' => $setup]);
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
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

        $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY,
            'gpu_architecture',
            [
                'type' => 'varchar',
                'label' => 'GPU Architecture',
                'input' => 'select',
                'source' => 'ATCP\Database\Model\Config\Source\GpuArchitectureOptions',
                'filterable' => true,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'backend' => '',
                'required' => true,
                'attribute_set' => 'graphic_card'
        ]);

        $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY,
            'gpu_memory_speed',
            [
                'type' => 'int',
                'label' => 'GPU Memory Speed',
                'input' => 'text',
                'source' => '',
                'filterable' => true,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'backend' => '',
                'required' => true,
                'attribute_set' => 'graphic_card'
            ]);

        $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY,
            'gpu_memory_size',
            [
                'type' => 'int',
                'label' => 'GPU Memory Size',
                'input' => 'text',
                'source' => '',
                'filterable' => true,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'backend' => '',
                'required' => true,
                'attribute_set' => 'graphic_card'
            ]);

        $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY,
            'gpu_brand',
            [
                'type' => 'varchar',
                'label' => 'GPU Brand',
                'input' => 'select',
                'source' => 'ATCP\Database\Model\Config\Source\GpuBrandOptions',
                'filterable' => true,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'backend' => '',
                'required' => true,
                'attribute_set' => 'graphic_card'
            ]);

        $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY,
            'gpu_country',
            [
                'type' => 'varchar',
                'label' => 'GPU Country',
                'input' => 'text',
                'source' => '',
                'filterable' => true,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'backend' => '',
                'required' => true,
                'attribute_set' => 'graphic_card'
            ]);

        $attributeGroupName = 'GPU Details';

        $categorySetup->addAttributeToGroup(
            \Magento\Catalog\Model\Product::ENTITY,
            $attributeSetId,
            $attributeGroupName,
            99
        );

        $categorySetup->addAttributeToGroup(
            \Magento\Catalog\Model\Product::ENTITY,
            $attributeSetId,
            $attributeGroupName,
            'gpu_architecture',
            1
        );

        $categorySetup->addAttributeToGroup(
            \Magento\Catalog\Model\Product::ENTITY,
            $attributeSetId,
            $attributeGroupName,
            'gpu_memory_speed',
            2
        );

        $categorySetup->addAttributeToGroup(
            \Magento\Catalog\Model\Product::ENTITY,
            $attributeSetId,
            $attributeGroupName,
            'gpu_memory_size',
            3
        );

        $categorySetup->addAttributeToGroup(
            \Magento\Catalog\Model\Product::ENTITY,
            $attributeSetId,
            $attributeGroupName,
            'gpu_brand',
            4
        );

        $categorySetup->addAttributeToGroup(
            \Magento\Catalog\Model\Product::ENTITY,
            $attributeSetId,
            $attributeGroupName,
            'gpu_country',
            5
        );
        $setup->endSetup();
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
