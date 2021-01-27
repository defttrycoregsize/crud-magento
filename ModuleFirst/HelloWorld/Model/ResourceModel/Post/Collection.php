<?php
namespace ModuleFirst\HelloWorld\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'modulefirst_helloworld_post_collection';
    protected $_eventObject = 'post_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('ModuleFirst\HelloWorld\Model\Post', 'ModuleFirst\HelloWorld\Model\ResourceModel\Post');
    }

}
