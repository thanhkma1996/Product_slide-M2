<?php

namespace AHT\Slider\Controller\Adminhtml\Featured;

use Magento\Catalog\Model\ProductFactory;
class Disable extends \Magento\Framework\App\Action\Action {

    private $_productFactory;
    
    public function __construct(
        \Magento\Framework\App\Action\Context $context,ProductFactory $productFactory
    ){
        parent::__construct($context);
        $this->_productFactory = $productFactory;

    }

    public function execute()
    {   
        if($_POST) {

            $id = $this->getRequest()->getParam('id');

            $enable = 0 ;
           
            $model = $this->_productFactory->create();
            $model->load($id);

            $model->setIs_featured($enable);
            $model->setEntity_id($id);
            $model->save();

            $this->messageManager->addSuccess(__('Disable featured product'));

            return $this->_redirect('slider/featured/index');
        }
        return $this->_redirect('sider/featured/index');
    }
}