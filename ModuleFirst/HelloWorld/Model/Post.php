<?php
namespace ModuleFirst\HelloWorld\Model;

/**
 * Class Post
 * @package ModuleFirst\HelloWorld\Model
 */
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'modulefirst_helloworld_post';

    protected $_cacheTag = 'modulefirst_helloworld_post';

    protected $_eventPrefix = 'modulefirst_helloworld_post';

    protected function _construct()
    {
        $this->_init('ModuleFirst\HelloWorld\Model\ResourceModel\Post');
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
