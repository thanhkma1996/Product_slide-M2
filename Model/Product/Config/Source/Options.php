<?php

namespace AHT\Slider\Model\Product\Config\Source;

use AHT\Slider\Model\ProductFactory;
use Magento\Framework\Escaper;

class Options implements \Magento\Framework\Option\ArrayInterface
{

    protected $ProductFactory;

    protected $escaper;

    public function __construct(ProductFactory $ProductFactory, Escaper $escaper)
    {
        $this->_ProductFactory = $ProductFactory;
        $this->escaper = $escaper;
    }

    public function toOptionArray()
    {
        return $this->getAvailableGroups();
    }

    private function getAvailableGroups()
    {
        $collection = $this->_ProductFactory->create()->getCollection();
        $result = [];
        // $result[] = ['value' => ' ', 'label' => 'Select new slide...'];
        foreach ($collection as $group) {
            $result[] = ['value' => $group->getSlider_id(), 'label' => $this->escaper->escapeHtml($group->getName_slide())];
        }
        return $result;
    }
}
