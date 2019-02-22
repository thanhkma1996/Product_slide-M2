<?php

namespace AHT\Slider\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->tableExists('aht_slider_product')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('aht_slider_product')
            )
                ->addColumn(
                    'slider_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'nullable' => false,
                        'primary'  => true,
                        'unsigned' => true,
                    ],
                    'Post ID'
                )
                ->addColumn(
                    'name_slide',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    ['nullable => false'],
                    'name slide'
                )
                ->addColumn(
                    'status_module',
                    \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    255,
                    ['nullable' => false, 'default' => '0'],
                    'status module'
                )
                ->addColumn(
                    'status_slide',
                    \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    255,
                    ['nullable' => false, 'default' => '0'],
                    'status slide'
                )
                ->addColumn(
                    'number_product_slide',
                    \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    255,
                    ['unsigned' => true, 'nullable' => false],
                    'limit number product in slide'
                )

                ->addColumn(
                    'number_product_module',
                    \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    255,
                    ['unsigned' => true, 'nullable' => false],
                    'limit number product in module'
                )
                ->addColumn(
                    'created_at',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                    'Created At'
                )->addColumn(
                    'updated_at',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
                    'Updated At')
                ->setComment('Post Table');
            $installer->getConnection()->createTable($table);

            $installer->getConnection()->addIndex(
                $installer->getTable('aht_slider_product'),
                $setup->getIdxName(
                    $installer->getTable('aht_slider_product'),
                    ['name_slide', 'status_module', 'status_slide', 'number_product_slide', 'number_product_module'],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                ),
                ['name_slide', 'status_module', 'status_slide', 'number_product_slide', 'number_product_module'],
                \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
            );
        }
        $installer->endSetup();
    }
}