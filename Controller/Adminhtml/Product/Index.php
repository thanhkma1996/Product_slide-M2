<?php

namespace AHT\Slider\Controller\Adminhtml\Product;

class Index extends \AHT\Slider\Controller\Adminhtml\Product
{

    public function execute()
    {
        $this->_initAction();
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Slider Product Featured'));
        $this->_view->renderLayout();
    }

}
