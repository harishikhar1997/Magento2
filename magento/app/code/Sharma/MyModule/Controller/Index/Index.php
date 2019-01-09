<?php
namespace Sharma\MyModule\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	protected $_postFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Sharma\MyModule\Model\PostFactory $postFactory
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_postFactory = $postFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		$post = $this->_postFactory->create()->load(2);
		$post->setUrlKey('hariThisSIde')->save();
		echo "<pre>";
		var_dump($post->getData());
		// $collection = $post->getCollection();

		// foreach($collection as $item){

		// 	// echo "<pre>";
		// 	// print_r($item->getData());
		// 	// echo "</pre>";
		// }
		exit();
		return $this->_pageFactory->create();
	}
}