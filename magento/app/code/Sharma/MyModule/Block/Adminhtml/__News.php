<?php
namespace Sharma\MyModule\Block\Adminhtml;
class News extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
		
        $this->_controller = 'adminhtml_post';/*block grid.php directory*/
        $this->_blockGroup = 'Sharma_MyModule';
        $this->_headerText = __('EDIT POST');
        $this->_addButtonLabel = __('Add New Entry'); 
        parent::_construct();
		
    }
}
