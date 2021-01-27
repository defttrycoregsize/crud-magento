<?php
namespace ModuleFirst\HelloWorld\Block;

/**
 * Class Display
 * @package ModuleFirst\HelloWorld\Block
 */
class Display extends \Magento\Framework\View\Element\Template
{
    protected $_postFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \ModuleFirst\HelloWorld\Model\PostFactory $postFactory

    )
    {
        $this->_postFactory = $postFactory;
        parent::__construct($context);
    }
    public function getPostCollection(){
        $post = $this->_postFactory->create();
        return $post->getCollection();
    }
}

