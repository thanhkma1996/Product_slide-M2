<?php

namespace AHT\Slider\Controller\Adminhtml\Post;

class NewAction extends \AHT\Slider\Controller\Adminhtml\Post
{
    public function execute()
    {
        $this->_forward('edit');
    }
}
