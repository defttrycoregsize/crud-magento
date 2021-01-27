<?php

namespace ModuleFirst\HelloWorld\Controller\Index;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;
use ModuleFirst\HelloWorld\Model\Post;

class Save extends Action
{
    /**
     * @var Post
     */
    private $post;
    /**
     * @var \ModuleFirst\HelloWorld\Model\ResourceModel\Post
     */
    private $postResourceModel;
    /**
     * @var Context
     */
    private $context;
    /**
     * @var \Magento\Framework\App\Cache\TypeListInterface
     */
    private $_cacheTypeList;
    /**
     * @var \Magento\Framework\App\Cache\Frontend\Pool
     */
    private $_cacheFrontendPool;

    /**
     * Save constructor.
     * @param Context $context
     * @param Post $post
     * @param \ModuleFirst\HelloWorld\Model\ResourceModel\Post $postResourceModel
     */

    public function __construct(
        Context $context,
        Post $post,
        \ModuleFirst\HelloWorld\Model\ResourceModel\Post $postResourceModel,
        \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList,
		\Magento\Framework\App\Cache\Frontend\Pool $cacheFrontendPool
    )
    {
        parent::__construct($context);
        $this->post = $post;
        $this->postResourceModel = $postResourceModel;
        $this->context = $context;

        $this->_cacheTypeList = $cacheTypeList;
        $this->_cacheFrontendPool = $cacheFrontendPool;
    }

    public function execute()
        {

            $params = $this->_request->getParams();

            $model = $this->post->setData($params);

            if (isset($_POST['id']))
            {
                $this->post->setId($_POST['id']) ;
            }

            $this->postResourceModel->save($model);

            $resultRedirect = $this->resultRedirectFactory->create();

            $types = ['config', 'layout', 'block_html', 'collections', 'reflection', 'db_ddl', 'compiled_config', 'eav', 'config_integration', 'config_integration_api', 'full_page', 'translate', 'config_webservice', 'vertex'];
            foreach ($types as $type) {
                $this->_cacheTypeList->cleanType($type);
            }
            foreach ($this->_cacheFrontendPool as $cacheFrontend) {
                $cacheFrontend->getBackend()->clean();
            }
            return $resultRedirect->setUrl('/helloworld/index/display');
        }
}
