<?php

namespace Revision\Module1\Block\Adminhtml\Display\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use Magento\Cms\Model\Wysiwyg\Config;

class Info extends Generic implements TabInterface
{
    /**
     * @var \Magento\Cms\Model\Wysiwyg\Config
     */
    protected $_wysiwygConfig;


   /**
     * @param Context $context
     * @param Registry $registry
     * @param FormFactory $formFactory
     * @param Config $wysiwygConfig
     * @param array $data
     */

    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        Config $wysiwygConfig,
        array $data = []
    ) {
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form fields
     *
     * @return \Magento\Backend\Block\Widget\Form
     */
    protected function _prepareForm()
    {
      
        $model = $this->_coreRegistry->registry('module1_display');
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('display_');
        $form->setFieldNameSuffix('display');

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('User Information')]
        );

        if ($model->getPostId()) {
            $fieldset->addField(
                'id',
                'hidden',

                ['name' => 'id',
                'value' =>$model->getPostId()
            ]
            );
        }
        $fieldset->addField(
            'title',
            'text',
            [
                'name'        => 'title',
                'label'    => __('Title'),
                'required'     => true,
                'value'=> $model->getTitle()
            ]
        );
        
        $fieldset->addField(
            'author',
            'text',
            [
                'name'      => 'author',
                'label'     => __('Author'),
                'required'  =>true,
                'value'     =>$model->getAuthor()
            ]
        );

        $wysiwygConfig = $this->_wysiwygConfig->getConfig();
        $fieldset->addField(
            'post_body',
            'editor',
            [
                'name'        => 'post_body',
                'label'    => __('Body'),
                'required'     => true,
                'config'    => $wysiwygConfig,
                 'value'=> $model->getPostBody()
            ]
        );

        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return __('News Info');
    }
 
    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return __('News Info');
    }
 
    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }
 
    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }
}