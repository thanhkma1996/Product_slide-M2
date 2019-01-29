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

    public function getProductCollection()
    {
        $sliderId = (int) $this->getSlider_id();
        $model = $this->_PostFactory->create();
        $model->load($sliderId);
        var_dump($sliderId);
        $collection = $this->_productFactory->create();
        $collection->addAttributeToSelect('*')->addAttributeToFilter('is_featured', '1');
        if ($model->getSlider_status() == 1) {
            $collection->setPageSize($model->getLimit_product());
        }
        return $collection;
    }

   

}
