<?php
namespace Sharma\MyModule\Controller\Adminhtml\Post;

class Delete extends \Magento\Backend\App\Action
{

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
     * @var \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
		$id = $this->getRequest()->getParam('deleteid');

        // $post = $this->getRequest()->getPost();
        // $postValues = $post['news'];
        $model = $this->postModel->load($id);
		
        try {
				// $banner = $this->_objectManager->get('Cpp\PhoneCategories\Model\CppCategory')->load($id);
				
                $model->delete();
                
                $this->messageManager->addSuccess(
                    __('Delete successfully !')
                );
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
	    $this->_redirect('*/*/');
    }
}