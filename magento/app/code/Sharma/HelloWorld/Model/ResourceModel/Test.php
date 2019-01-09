<?php
namespace Sharma\HelloWorld\Model\ResourceModel;
class Test extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('sharma_helloworld_test','test_id');
    }
}
