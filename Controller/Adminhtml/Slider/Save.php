<?php

namespace AHT\Slider\Controller\Adminhtml\Slider;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Filesystem\DirectoryList;
use AHT\Slider\Model\SliderFactory;

class Save extends \AHT\Slider\Controller\Adminhtml\Slider
{

    public function __construct(Context $context,SliderFactory $SliderFactory,
        array $data = [] ) {
        parent::__construct($context, $data);
        $this->_SliderFactory = $SliderFactory;
    
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('slider_id');
            $model = $this->_SliderFactory->create();
            $model->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addError(__('This item no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
            $model->setData($data);
            try {
                $model->save();
          
                $this->messageManager->addSuccess(__('You saved the item.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['slider_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
                return $resultRedirect->setPath('*/*/edit', ['slider_id' => $this->getRequest()->getParam('slider_id')]);
            }
        }
        return $resultRedirect->setPath('*/*/');
    }
}
