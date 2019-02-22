<?php

namespace AHT\Slider\Model\Slider\Config\Source;

use AHT\Slider\Model\SliderFactory;
use Magento\Framework\Escaper;

class Options implements \Magento\Framework\Option\ArrayInterface
{

    protected $SliderFactory;

    protected $escaper;

    public function __construct(SliderFactory $SliderFactory, Escaper $escaper)
    {
        $this->_SliderFactory = $SliderFactory;
        $this->escaper = $escaper;
    }

    public function toOptionArray()
    {
        return $this->getAvailableGroups();
    }

    private function getAvailableGroups()
    {
        $collection = $this->_SliderFactory->create()->getCollection();
        $result = [];
        foreach ($collection as $group) {
            $result[] = ['value' => $group->getSlider_id(), 'label' => $this->escaper->escapeHtml($group->getName_slide())];
        }
        return $result;
    }
}
