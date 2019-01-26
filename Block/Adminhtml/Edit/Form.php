<?php

namespace AHT\Slider\Block\Adminhtml\Edit;

class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    protected $_wysiwygConfig;
    protected $_systemStore;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \Magento\Store\Model\System\Store $systemStore,
        array $data = []
    )
    {
        $this->_wysiwygConfig = $wysiwygConfig;
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    protected function _construct()
    {
        parent::_construct();
        $this->setId('post__form');
        $this->setTitle(__('Information'));
    }

    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('slider_post');

        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post', 'enctype' => 'multipart/form-data']]
        );

        $fieldset = $form->addFieldset('add_post_form', ['legend' => __('Post')]);

        if ($model->getId()) {
            $fieldset->addField('slider_id', 'hidden', ['name' => 'slider_id']);
        }

        $fieldset->addField(
            'name_slide',
            'text',
            [
                'label' => __('Name Slide'),
                'name' => 'name_slide',
                'required' => true,
                'value' => $model->getNameSlide()
            ]
        );

        $fieldset->addField(
            'limit_product',
            'text',
            [
                'label' => __('limit product'),
                'name' => 'limit_product',
                'required' => true,
                'value' => $model->getLimitProduct()
            ]
        );

        $fieldset->addField(
            'status_module',
            'select',
            [
                'label' => __('Status Modulle'),
                'name' => 'status_module',
                'required' => false,
                'options' => ['1' => __('Enabled'), '0' => __('Disabled')]
            ]
        );

        $fieldset->addField(
            'status_slide',
            'select',
            [
                'label' => __('Status Slide'),
                'name' => 'status_slide',
                'required' => false,
                'options' => ['1' => __('Enabled'), '0' => __('Disabled')]
            ]
        );

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
