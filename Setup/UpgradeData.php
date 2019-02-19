<?php
namespace AHT\Slider\Setup;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetupFactory;

class UpgradeData implements UpgradeDataInterface
{
    protected $resourceConfig;
    private $eavSetupFactory;

    public function __construct
    (\Magento\Config\Model\ResourceModel\Config $resourceConfig,EavSetupFactory $eavSetupFactory)
    {
        $this->resourceConfig = $resourceConfig;
        $this->eavSetupFactory = $eavSetupFactory;
    }


    public function upgrade(ModuleDataSetupInterface $setup,
                            ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(),
                '1.0.1') < 0) {
            $this->resourceConfig->saveConfig(
                'web/cookie/cookie_lifetime',
                '7200',
                \Magento\Config\Block\System\Config\
                Form::SCOPE_DEFAULT,
                0
            );
            if (version_compare($context->getVersion(),
                    '1.0.1') < 0) {

                        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
                        $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY, 'is_featured', [
                                'type'                    => 'int',
                                'backend'                 => '',
                                'frontend'                => '',
                                'label'                   => 'Featured Product Slider',
                                'note'                    => '',
                                'input'                   => 'boolean',
                                'class'                   => '',
                                'source'                   => '',
                                'global'                  => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                                'visible'                 => true,
                                'required'                => false,
                                'user_defined'            => true,
                                'default'                 => '',
                                'searchable'              => false,
                                'filterable'              => false,
                                'comparable'              => false,
                                'visible_on_front'        => false,
                                'used_in_product_listing' => true,
                                'unique'                  => false,
                                'sort_order'              => 10,
                                'apply_to'                => 'simple,virtual,bundle,downloadable,grouped,configurable'
                            ]
                );

            }
        }
    }
}