<?php

namespace AHT\Slider\Controller\Adminhtml\Post;

class Index extends \AHT\Slider\Controller\Adminhtml\Post
{

    public function execute()
    {
        $this->_initAction();
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Slider Product'));
        $this->_view->renderLayout();
    }

}
