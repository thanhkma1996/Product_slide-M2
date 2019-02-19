<?php

namespace AHT\Slider\Controller\Adminhtml;

use Magento\Backend\App\Action;

abstract class Featured extends Action
{
    protected function _initAction()
    {
        $this->_view->loadLayout();
        $this->_setActiveMenu(
            'AHT_Slider::slider'
        )->_addBreadcrumb(
            __('Slider'),
            __('Slider')
        );
        return $this;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('AHT_Slider::slider');
    }
}

