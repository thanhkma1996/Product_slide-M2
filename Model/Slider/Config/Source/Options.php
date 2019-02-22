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
        $this->_sliderFactory = $SliderFactory;
        $this->escaper = $escaper;
    }
   
   
    public function toOptionArray()
    {
        return $this->getAvailableGroups();
    }
   
   
    private function getAvailableGroups()
    {
        $collection = $this->_sliderFactory->create()->getCollection();
        $result = [];
        foreach ($collection as $group) {
            $result[] = ['value' => $group->getSliderId(), 'label' => $this->escaper->escapeHtml($group->getNameSlide())];
        }
        return $result;
    }
}