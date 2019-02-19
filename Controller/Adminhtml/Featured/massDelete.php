<?php

namespace AHT\Slider\Controller\Adminhtml\Featured;

class massDelete extends \AHT\Slider\Controller\Adminhtml\Featured
{
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $ids = $this->getRequest()->getPost('ids');
        if (!is_array($ids)) {
            $this->messageManager->addError(__('Please select item(s).'));
        } else {
            try {
                foreach ($ids as $id) {
                    $model = $this->_objectManager->create('AHT\Slider\Model\Product')
                        ->load($id)
                        ->delete();
                }
                $this->messageManager->addSuccess(__('Total of %1 record(s) were successfully deleted.', count($ids)));

            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }
        return $resultRedirect->setPath('*/*/');
    }
}
