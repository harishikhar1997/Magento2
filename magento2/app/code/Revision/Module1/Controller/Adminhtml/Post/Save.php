<?php

namespace Revision\Module1\Controller\Adminhtml\Post;


class Save extends \Magento\Backend\App\Action
{

   protected $postModelFactory;

   public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Revision\Module1\Model\Post $postModel,
        \Revision\Module1\Model\PostFactory $postModelFactory,
        \Magento\Framework\Registry $coreRegistry
    ) {
        $this->postModelFactory = $postModelFactory;
        $this->_coreRegistry = $coreRegistry;
        $this->postModel = $postModel;
        parent::__construct($context);
    }

   /**
     * @return void
     */
   public function execute()
   {
      $post = $this->getRequest()->getPost();
         $postValues = $post['display'];
         $model = '';
         if(isset($postValues['id'])){
            $model = $this->postModel->load($postValues['id']);
         }else{
            $model = $this->postModelFactory->create();
         }
            $model->setTitle($postValues['title']);
            $model->setPostBody($postValues['post_body']);
            $model->setAuthor($postValues['author']);
            
         try
         {
            $model->save();         

            $this->messageManager->addSuccess(__('The post has been saved.'));

            // Check if 'Save and Continue'
            if ($this->getRequest()->getParam('back')) {
               $this->_redirect('*/*/edit', ['id' => $this->postModel->getId(), '_current' => true]);
               return;
            }else{
               $this->_redirect('*/*/');
               return;   
            }
            
         }
         catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
         }


    }
}