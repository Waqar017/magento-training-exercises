<?php
/**
 * Created by PhpStorm.
 * User: sandor
 * Date: 26/07/16
 * Time: 15:33
 */

namespace Custom\Exercise21\Controller\Log;

use Magento\Framework\App\RouterList;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;


class Log extends \Magento\Framework\App\Action\Action
{

    /**
     * @var RouterList
     */
    protected $_routerList;

    protected $_pageFactory;

    /**
     * @param Context $context
     * @param RouterList $routerList
     */
    public function __construct(
        Context    $context,
        RouterList $routerList,
        PageFactory $_pageFactory
    )
    {
        $this->_pageFactory = $_pageFactory;
        $this->_routerList = $routerList;
        parent::__construct($context);
    }

    /**
     * say hello text
     */
    public function execute()
    {
        $data = $this->getRoutersString();
        print_r($data);
        exit();
        return $this->_pageFactory->create();

    }

    protected function getRoutersString()
    {
        $ret = '';
        foreach ($this->_routerList as $router) {
            $ret .= get_class($router) . "<br>";
        }
        return $ret;
    }
}
