<?php

namespace Sharma\MyModule\Controller\Adminhtml\Post;

use Magento\Framework\Controller\ResultFactory;

class Edit extends \Magento\Backend\App\Action
{

    protected  $postModel;

    protected $_coreRegistry;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Sharma\MyModule\Model\Post $postModel,
        \Magento\Framework\Registry $coreRegistry
    ) {
        $this->_coreRegistry = $coreRegistry;
        $this->postModel = $postModel;
        parent::__construct($context);
    }
   /**
     * @return void
     */
   public function execute()
   {
        $id = $this->getRequest()->getParam('id');
        /** @var \Tutorial\SimpleNews\Model\News $model */
        $model = $this->postModel->load($id);
        // var_dump($model->getData());

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This post no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }

        // Restore previously entered form data from session
        // $data = $this->_session->getNewsData(true);
        // if (!empty($data)) {
        //     $model->setData($data);
        // }
        $this->_coreRegistry->register('mymodule_news', $model);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        // $resultPage = $this->_resultPageFactory->create();
        // $resultPage->setActiveMenu('Tutorial_SimpleNews::main_menu');
        // $resultPage->getConfig()->getTitle()->prepend(__('Simple News'));
        // return $resultPage;


        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->renderLayout();

   }
}
