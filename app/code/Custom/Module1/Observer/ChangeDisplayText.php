<?php

namespace Custom\Module1\Observer;

class ChangeDisplayText implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $this->createCustomer();
        return $this;
    }

    /** Create customer
     * Pass customer data as array
     */
    public function createCustomer()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
        $storeId = $storeManager->getStore()->getId();

        $websiteId = $storeManager->getStore($storeId)->getWebsiteId();

        try {
            $customer = $objectManager->get('\Magento\Customer\Api\Data\CustomerInterfaceFactory')->create();
            $customer->setWebsiteId($websiteId);
            $email = 'test11@example.com';
            $customer->setEmail($email);
            $customer->setFirstname("test first");
            $customer->setLastname("test last");
            $hashedPassword = $objectManager->get('\Magento\Framework\Encryption\EncryptorInterface')->getHash('MyNewPass', true);
            $objectManager->get('\Magento\Customer\Api\CustomerRepositoryInterface')->save($customer, $hashedPassword);
            $customer = $objectManager->get('\Magento\Customer\Model\CustomerFactory')->create();
            $customer->setWebsiteId($websiteId)->loadByEmail($email);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
