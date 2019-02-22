<?php

namespace AHT\Slider\Controller\Adminhtml\Slider;

class Edit extends \AHT\Slider\Controller\Adminhtml\Slider
{
    protected $_coreRegistry = null;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Registry $coreRegistry)
    {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $model = $this->_objectManager->create('AHT\Slider\Model\Slider');

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This item no longer exists.'));
                $this->_redirect('slider/*/');
                return;
            }
        }

        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        $this->_coreRegistry->register('slider_post', $model);

        $this->_initAction()->_addBreadcrumb(
            $id ? __('Edit %1', $model->getName()) : __('New Item'),
            $id ? __('Edit %1', $model->getName()) : __('New Item')
        )->_addContent(
            $this->_view->getLayout()->createBlock('AHT\Slider\Block\Adminhtml\Edit')
        );
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Slider Product'));
        $this->_view->getPage()->getConfig()->getTitle()->prepend(
            $model->getId() ? $model->getName() : __('New Item')
        );
        $this->_view->renderLayout();
    }
}