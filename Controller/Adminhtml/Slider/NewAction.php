<?php

namespace AHT\Slider\Controller\Adminhtml\Slider;

class NewAction extends \AHT\Slider\Controller\Adminhtml\Slider
{
    public function execute()
    {
        $this->_forward('edit');
    }
}
