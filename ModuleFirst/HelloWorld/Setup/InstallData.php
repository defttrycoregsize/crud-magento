<?php

namespace ModuleFirst\HelloWorld\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    protected $_postFactory;

    public function __construct(\ModuleFirst\HelloWorld\Model\PostFactory $postFactory)
    {
        $this->_postFactory = $postFactory;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Exception
     */

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $datas = [
            [
            'name'         => "How to Create SQL Setup Script in Magento 2",
            'content' => "In this article, we will find out how to install and upgrade sql script for module in Magento 2. When you install or upgrade a module, you may need to change the database structure or add some new data for current table. To do this, Magento 2 provide you some classes which you can do all of them.",
            ],
            [
            'name'         => "How to Create SQL Setup Script in Magento 299999",
            'content' => "9999999999999999In this article, we will find out how to install and upgrade sql script for module in Magento 2. When you install or upgrade a module, you may need to change the database structure or add some new data for current table. To do this, Magento 2 provide you some classes which you can do all of them.",

            ],
            ];
        $post = $this->_postFactory->create();
        foreach ($datas as $data)
        {
            $post->addData($data)->save();
        }

    }
}
