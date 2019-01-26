<?php
namespace AHT\Slider\Block\Widget;

use AHT\Slider\Model\PostFactory;
use Magento\Catalog\Block\Product\AbstractProduct;
use Magento\Catalog\Block\Product\Context;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Widget\Block\BlockInterface;

class Slider extends AbstractProduct implements BlockInterface
{

    protected $_productFactory;
    public function __construct (   Context $context,CollectionFactory $productFactory, array $data = []) {
        parent::__construct($context,$data );
        $this->_productFactory = $productFactory;
    }

    public function _construct()
    {
        parent::_construct();

        $this->setTemplate('AHT_Slider::widget/slider.phtml');
    }

    public function getProducts()
    {
        $collection = $this->_productFactory->create();
        $collection->addAttributeToSelect('*')->addAttributeToFilter('is_featured', '1');
        return $collection;
    }


}
