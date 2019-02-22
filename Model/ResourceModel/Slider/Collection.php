<?php
namespace AHT\Slider\Model\ResourceModel\Slider;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'slider_id';
	protected $_eventPrefix = 'aht_slider_product_collection';
	protected $_eventObject = 'slider_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('AHT\Slider\Model\Slider', 'AHT\Slider\Model\ResourceModel\Slider');
	}

}
