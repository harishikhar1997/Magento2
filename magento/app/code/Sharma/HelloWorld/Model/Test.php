<?php
namespace Sharma\HelloWorld\Model;
class Test extends \Magento\Framework\Model\AbstractModel implements \Sharma\HelloWorld\Api\Data\TestInterface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'sharma_helloworld_test';

    protected function _construct()
    {
        $this->_init('Sharma\HelloWorld\Model\ResourceModel\Test');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
