<?php
namespace Revision\Module1\Model\ResourceModel;


class Post extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}	
	protected function _construct()
	{
		$this->_init('revision_module1_post', 'post_id');
	}
	
}