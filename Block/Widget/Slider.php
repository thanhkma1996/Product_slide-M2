<?php
namespace AHT\Slider\Block\Widget;
use AHT\Slider\Model\SliderFactory;
use Magento\Catalog\Block\Product\AbstractProduct;
use Magento\Catalog\Block\Product\Context;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Widget\Block\BlockInterface;
class Slider extends AbstractProduct implements BlockInterface
{
    protected $_productFactory;
    protected $_SliderFactory;
   
   
    public function __construct(Context $context,CollectionFactory $productFactory,SliderFactory $SliderFactory,
        array $data = [] ) {
        parent::__construct($context, $data);
        $this->_productFactory = $productFactory;
        $this->_sliderFactory = $SliderFactory;
    }
   
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('widget/slider.phtml');
    }
   
  
  
    public function getSlide()
    {
        $sliderID = $this->getSliderId();
        $data = $this->_sliderFactory->create();
        $data->load($sliderID);
        $collection = $this->_productFactory->create();
        $collection->addAttributeToSelect('*')->addAttributeToFilter('is_featured', '1')->setPageSize($data->getNumberProductModule());
        if($data->getStatusSlide() == 1) {
            $collection->setPageSize($data->getNumberProductSlide());
        }
       
        return $collection;
    }
   
    public function getModuleStatus()
    {
        $sliderID = $this->getSliderId();
        $data = $this->_sliderFactory->create();
        $data->load($sliderID);
        if($data->getStatusModule() == 1) {
            return true;
        }
        return false;
    }
   
    public function getSlideStatus()
    {
        $sliderID = $this->getSliderId();
        $data = $this->_sliderFactory->create();
        $data->load($sliderID);
        if($data->getStatusSlide() == 1) {
            return true;
        }
        return false;
    }
   
}