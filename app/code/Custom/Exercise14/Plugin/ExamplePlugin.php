<?php

namespace Custom\Exercise14\Plugin;

class ExamplePlugin
{
    /**
     * @var
     */
    protected $_logger;

    /**
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->_logger = $logger;
    }


    public function afterDispatch(\Magento\Framework\App\Action\Action $action, $result)
    {
        $action = $action->getRequest()->getFullActionName();
        $this->_logger->info("Example: " . $action);
        return $result;

    }


//    public function beforeSetTitle(\Custom\Exercise14\Controller\Index\Example $subject, $title)
//    {
//
//    }

//    public function afterGetTitle(\Custom\Exercise14\Controller\Index\Example $subject, $result)
//    {
//
//        echo __METHOD__ . "</br>";
//
//        return '<h1>' . $result . 'Magephlaza.com' . '</h1>';
//
//    }
//
//    public function aroundGetTitle(\Custom\Exercise14\Controller\Index\Example $subject, callable $proceed)
//    {
//
//        echo __METHOD__ . " - Before proceed() </br>";
//        $result = $proceed();
//        echo __METHOD__ . " - After proceed() </br>";
//
//
//        return $result;
//    }
}
