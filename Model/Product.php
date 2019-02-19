<?php
namespace AHT\Slider\Model;
class Product extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'aht_slider_post';

	protected $_cacheTag = 'aht_slider_post';

	protected $_eventPrefix = 'aht_slider_post';

	protected function _construct()
	{
		$this->_init('AHT\Slider\Model\ResourceModel\Product');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}
