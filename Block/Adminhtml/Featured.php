<?php

namespace AHT\Slider\Block\Adminhtml;


class Featured extends \Magento\Framework\View\Element\Template
{

    protected $_productCollection;
        
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,        
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollection,        
        array $data = []
    )
    {    
        $this->_productCollection = $productCollection;    
        parent::__construct($context, $data);
    }
    
    public function getProductCollection()
    {
        $collection = $this->_productCollection->create();
        $collection->addAttributeToSelect('*')->addAttributeToFilter('is_featured', '1');
        return $collection;
    }

}