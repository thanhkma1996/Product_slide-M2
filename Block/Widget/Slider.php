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
    protected $_PostFactory;
    public function __construct
    (
        Context $context,
        CollectionFactory $productFactory,
        PostFactory $PostFactory,
        array $data = []
    ) {
        parent::__construct(
            $context,
            $data
        );
        $this->_productFactory = $productFactory;
        $this->_PostFactory = $PostFactory;
    }

    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('widget/slider.phtml');
    }

    public function getSlide()
    {
        $sliderId = (int) $this->getSlider_id();
        var_dump($sliderId);
        $data = $this->_PostFactory->create();
        $data->load($sliderId);
        $collection = $this->_productFactory->create();
        $collection->addAttributeToSelect('*')->addAttributeToFilter('is_featured', '1');
        if($data->getStatus_slide() == 1) {
            $collection->setPageSize($data->getLimit_product());
        }
       
        return $collection;
    }

    public function StatusModule()
    {
        $sliderId = (int) $this->getSlider_id();
        $data = $this->_PostFactory->create();
        $data->load($sliderId);
        if($data->getStatus_module() == 1) {
            return true;
        }
        return false;
    }
   
    public function StatusSlide()
    {
        $sliderId = (int) $this->getSlider_id();
        $data = $this->_PostFactory->create();
        $data->load($sliderId);
        if($data->getStatus_slide() == 1) {
            return true;
        }
        return false;
    }
   

}
