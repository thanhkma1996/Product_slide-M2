<?php

namespace AHT\Slider\Model\Config\Source;

use AHT\Slider\Model\PostFactory;
use Magento\Framework\Escaper;

class Options implements \Magento\Framework\Option\ArrayInterface
{

    protected $PostFactory;

    protected $escaper;

    public function __construct(PostFactory $PostFactory, Escaper $escaper)
    {
        $this->PostFactory = $PostFactory;
        $this->escaper = $escaper;
    }

    public function toOptionArray()
    {
        return $this->getAvailableGroups();
    }

    private function getAvailableGroups()
    {
        $collection = $this->PostFactory->create()->getCollection();
        $result = [];
        $result[] = ['value' => ' ', 'label' => 'Select Slider Product...'];
        foreach ($collection as $group) {
            $result[] = ['value' => $group->getSliderID(), 'label' => $this->escaper->escapeHtml($group->getNameSlide())];
        }
        return $result;
    }
}
