<?php
namespace AHT\Slider\Model\ResourceModel\Product;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'slider_id';
	protected $_eventPrefix = 'aht_slider_post_collection';
	protected $_eventObject = 'post_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('AHT\Slider\Model\Product', 'AHT\Slider\Model\ResourceModel\Product');
	}

}
