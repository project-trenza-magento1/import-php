<?php

require_once('../../app/Mage.php');
Mage::app('admin'); 
$customer = Mage::getModel("customer/customer");
  $website_id = 1;
  $customer->setWebsiteId($website_id);
		echo $email = 'maarit.bjorkbacka@pp.inet.fi';
		$firstname = 'Maarit';
		$gender = '';
		$lastname = 'BjÃrkbacka';
		$password = '5015a36fbe32bc82694d45fa655a5ee8:p2h7NzhiOjwlM1QnxxXTWiLP94tvDpTR';
		$customer->loadByEmail($email);
	  if(!$customer->getId()) {
			echo 'Done!!<br>';
			$websiteId = Mage::app()->getWebsite()->getId();
			$store = Mage::app()->getStore();
			$newCustomer = array(
							'email' => $email,
							'password_hash' => $password,
							'store_id' => 1,
							'website_id' => 1,
							'group_id' => 1,
							'company' => '',
							'firstname' => $firstname,
							'lastname' => $lastname,
							'taxvat' => '',

						);
			  try {
				$customer = Mage::getModel('customer/customer');
				$customer->setData($newCustomer);
				$customer->save();
			  } catch (Exception $e) {
				  echo $e->getMessage();
			  }
	  } else {

	  }
		
	




?>