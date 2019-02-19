<?php

namespace AHT\Slider\Controller\Adminhtml\Product;

class Add extends \Magento\Framework\App\Action\Action {

    public function __construct(
        \Magento\Framework\App\Action\Context $context
    ){
        parent::__construct($context);
    }

    public function execute()
    {   
        if($_POST) {

            $id = $this->getRequest()->getParam('id');

            $enable = 0 ;
           
            $model = $this->_objectManager->create('Magento\Catalog\Model\Product')->load($id);

            $model->setIs_featured($enable);
            $model->setEntity_id($id);
            $model->save();

            $this->messageManager->addSuccess(__('Disable featured product'));

            return $this->_redirect('slider/product/index');
        }
        return $this->_redirect('sider/product/index');
    }
}