<?php

namespace AHT\Slider\Model\Post\Config\Source;

use AHT\Slider\Model\PostFactory;
use Magento\Framework\Escaper;

class Options implements \Magento\Framework\Option\ArrayInterface
{

    protected $PostFactory;

    protected $escaper;

    public function __construct(PostFactory $PostFactory, Escaper $escaper)
    {
        $this->_PostFactory = $PostFactory;
        $this->escaper = $escaper;
    }

    public function toOptionArray()
    {
        return $this->getAvailableGroups();
    }

    private function getAvailableGroups()
    {
        $collection = $this->_PostFactory->create()->getCollection();
        $result = [];
        // $result[] = ['value' => ' ', 'label' => 'Select new slide...'];
        foreach ($collection as $group) {
            $result[] = ['value' => $group->getSlider_id(), 'label' => $this->escaper->escapeHtml($group->getName_slide())];
        }
        return $result;
    }
}
