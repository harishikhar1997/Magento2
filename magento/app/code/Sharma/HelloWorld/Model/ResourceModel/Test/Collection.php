<?php
namespace Sharma\HelloWorld\Model\ResourceModel\Test;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Sharma\HelloWorld\Model\Test','Sharma\HelloWorld\Model\ResourceModel\Test');
    }
}
