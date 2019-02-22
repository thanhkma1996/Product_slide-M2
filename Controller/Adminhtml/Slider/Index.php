<?php

namespace AHT\Slider\Controller\Adminhtml\Slider;

class Index extends \AHT\Slider\Controller\Adminhtml\Slider
{

    public function execute()
    {
        $this->_initAction();
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Slider Product'));
        $this->_view->renderLayout();
    }

}
