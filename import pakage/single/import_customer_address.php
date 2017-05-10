<?php
exit();
require_once('../../app/Mage.php');
Mage::app('admin'); 
$customer = Mage::getModel("customer/customer");
  $website_id = 1;
  $customer->setWebsiteId($website_id);
  $customer->loadByEmail('roosa.hannikainen@gmail.com');
  
  // if customer does not already exists, by email
  if($customer->getId()) {
		$address = Mage::getModel("customer/address");
		$address->setCustomerId($customer->getId())
			->setFirstname($customer->getFirstname())
			->setMiddleName($customer->getMiddlename())
			->setLastname($customer->getLastname())
			->setCountryId('FI')
			->setPostcode('730')
			->setCity('Helsinki')
			->setTelephone('503850756')
			->setFax('')
			->setStreet('Kennotie 8 G')
			->setIsDefaultBilling('1')
			->setIsDefaultShipping('')
			->setSaveInAddressBook('1');
			
		try{
		$address->save();
		}
		catch (Exception $e) {
			Zend_Debug::dump($e->getMessage());
		}
  
  } else {
  }
?>