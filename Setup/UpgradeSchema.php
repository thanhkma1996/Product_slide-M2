<?php

namespace AHT\Slider\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

/**
 * Class UpgradeSchema
 * @package AHT\Slider\Setup
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $connection = $setup->getConnection();

        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            if ($setup->tableExists('aht_slider_post')) {
                $connection->dropTable($setup->getTable('aht_slider_post'));
            }
            $table = $connection->newTable($setup->getTable('aht_slider_post'))
                ->addColumn('slider_id', Table::TYPE_INTEGER, null, [
                    'identity' => true,
                    'unsigned' => true,
                    'nullable' => false,
                    'primary'  => true
                ], 'slider Id')
                ->addColumn('name_slide', Table::TYPE_TEXT, 255, [], 'Name')
                ->addColumn('status_module', Table::TYPE_SMALLINT, null, ['nullable' => false, 'default' => '0'], 'Status Module')
                ->addColumn('status_slide', Table::TYPE_SMALLINT, null, ['nullable' => false, 'default' => '0'], 'Status Slide')
                ->addColumn('status_slide', Table::TYPE_SMALLINT, null, ['nullable' => false, 'default' => '0'], 'Status Slide')
                ->addColumn('is_featured', Table::TYPE_SMALLINT, null, ['nullable' => false, 'default' => '0'], 'Status Slide')
                ->addColumn('limit_product', Table::TYPE_SMALLINT, null, ['unsigned' => true, 'nullable' => false], 'Limit the number of products slide')
                ->addColumn('created_at', Table::TYPE_TIMESTAMP, null, ['nullable' => false, 'default' => Table::TIMESTAMP_INIT], 'Creation Time')
                ->addColumn('updated_at', Table::TYPE_TIMESTAMP, null, ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE], 'Update Time')
                ->setComment('Product Slider AHT');

            $setup->getConnection()->createTable($table);
        }

        $setup->endSetup();
    }
}
