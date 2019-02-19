<?php
namespace AHT\Slider\Block\Widget;

use AHT\Slider\Model\ProductFactory;
use Magento\Catalog\Block\Product\AbstractProduct;
use Magento\Catalog\Block\Product\Context;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Widget\Block\BlockInterface;

class Slider extends AbstractProduct implements BlockInterface
{

    protected $_productFactory;
    protected $_SliderFactory;
    public function __construct(Context $context,CollectionFactory $productFactory,ProductFactory $SliderFactory,
        array $data = [] ) {
        parent::__construct($context, $data);
        $this->_productFactory = $productFactory;
        $this->_SliderFactory = $SliderFactory;
    }

    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('widget/slider.phtml');
    }

    public function getSlide()
    {
        $sliderID = $this->getSlider_id();
        // var_dump($sliderID);
        $data = $this->_SliderFactory->create();
        $data->load($sliderID);
        $collection = $this->_productFactory->create();
        $collection->addAttributeToSelect('*')->addAttributeToFilter('is_featured', '1')->setPageSize($data->getNumber_product_module());
        if($data->getStatus_slide() == 1) {
            $collection->setPageSize($data->getNumber_product_slide());
        }
       
        return $collection;
    }

    public function StatusModule()
    {
        $sliderID = $this->getSlider_id();
        $data = $this->_SliderFactory->create();
        $data->load($sliderID);
        if($data->getStatus_module() == 1) {
            return true;
        }
        return false;
    }
   
    public function StatusSlide()
    {
        $sliderID = $this->getSlider_id();
        $data = $this->_SliderFactory->create();
        $data->load($sliderID);
        if($data->getStatus_slide() == 1) {
            return true;
        }
        return false;
    }
   

}
