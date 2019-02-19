<?php

namespace AHT\Slider\Controller\Adminhtml\Featured;

class NewAction extends \AHT\Slider\Controller\Adminhtml\Featured
{
    public function execute()
    {
        $this->_forward('edit');
    }
}
