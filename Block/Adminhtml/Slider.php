<?php
namespace AHT\Slider\Block\Adminhtml;

class Slider extends \Magento\Backend\Block\Widget\Grid\Container
{

	protected function _construct()
	{
		$this->_controller = 'adminhtml_post';
		$this->_blockGroup = 'AHT_Slider';
		$this->_headerText = __('Slider Product');
		$this->_addButtonLabel = __('Create New Slide');
		parent::_construct();
	}
}
