<?php
namespace Sharma\MyModule\Model;

class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'sharma_mymodule_post';

	protected $_cacheTag = 'sharma_mymodule_post';

	protected $_eventPrefix = 'sharma_mymodule_post';

	protected function _construct()
	{
		$this->_init('Sharma\MyModule\Model\ResourceModel\Post');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}