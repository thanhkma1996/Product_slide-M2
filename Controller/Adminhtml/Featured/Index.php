<?php

namespace AHT\Slider\Controller\Adminhtml\Featured;

class Index extends \AHT\Slider\Controller\Adminhtml\Featured
{

    public function execute()
    {
        $this->_initAction();
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Slider Product'));
        $this->_view->renderLayout();
    }

}
