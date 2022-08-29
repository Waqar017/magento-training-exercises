<?php

namespace Custom\Exercise15\Observer;

class Predispach implements \Magento\Framework\Event\ObserverInterface
{
    protected $_logger;
    protected $req;
    public function __construct(\Psr\Log\LoggerInterface $logger, \Magento\Framework\App\RequestInterface $request)
    {
        $this->req = $request;
        $this->_logger = $logger;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $action = $this->req->getFullActionName();
        $this->_logger->info("Example: " . $action);
    }
}
