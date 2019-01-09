<?php
namespace Revision\Module1\Block;
class Display extends \Magento\Framework\View\Element\Template
{
	protected $_postFactory;

	protected $templateProcessor;

	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Revision\Module1\Model\PostFactory $postFactory,
		\Zend_Filter_Interface $templateProcessor
	)
	{
		$this->templateProcessor = $templateProcessor;
		$this->_postFactory = $postFactory;
		parent::__construct($context);
	}

	public function sayHello()
	{
		return __('Hello World');
	}

	public function getPostCollection(){
		$post = $this->_postFactory->create();
		return $post->getCollection();
	}

	public function filterOutputHtml($string)
	{
    return $this->templateProcessor->filter($string);
	}  
}
