<?php
namespace Custom\Module1\Controller\Index;

class Test extends \Magento\Framework\App\Action\Action
{


    protected $_pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $textDisplay = new \Magento\Framework\DataObject(array('text' => 'Create a customer.'));
        $this->_eventManager->dispatch('Custom_Module1_display_text', ['mp_text' => $textDisplay]);
        return $this->_pageFactory->create();
    }
}
