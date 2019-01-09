<?php

namespace Sharma\MyModule\Block\Adminhtml\News\Edit\Tab;

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
       /** @var $model \Tutorial\SimpleNews\Model\News */
        $model = $this->_coreRegistry->registry('mymodule_news');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('news_');
        $form->setFieldNameSuffix('news');

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
            'name',
            'text',
            [
                'name'        => 'name',
                'label'    => __('Name'),
                'required'     => true,
                'value'=> $model->getName()
            ]
        );

        $fieldset->addField(
            'url_key',
            'text',
            [
                'name'      => 'url_key',
                'label'     => __('Url Key'),
                'required'  => true,
                // 'style'     => 'height: 15em; width: 30em;'
                'value'     =>$model->getUrlKey()
            ]
        );

        $fieldset->addField(
            'post_content',
            'textarea',
            [
                'name'        => 'post_content',
                'label'    => __('Content'),
                'required'     => true,
                'value'=> $model->getPostContent()
            ]
        );
        
        $fieldset->addField(
            'tags',
            'text',
            [
                'name'      => 'tags',
                'label'     => __('Tags'),
                'required'  =>true,
                'value'     =>$model->getTags()
            ]
        );
        
        $fieldset->addField(
            'status',
            'text',
            [
                'name'      => 'status',
                'label'     => __('Status'),
                'required'  =>true,
                'value'     =>$model->getStatus()
            ]
        );



        // $wysiwygConfig = $this->_wysiwygConfig->getConfig();
        // $fieldset->addField(
        //     'description',
        //     'editor',
        //     [
        //         'name'        => 'description',
        //         'label'    => __('Description'),
        //         'required'     => true,
        //         'config'    => $wysiwygConfig
        //     ]
        // );

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