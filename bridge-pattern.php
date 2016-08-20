<?php
/*
 * Bridge Pattern example
 * The bridge pattern is building two collections of strategies,
 * where all strategies from one interface can make use of the strategies
 * from the other interface. 
 * As an example lets assume you have a device strategy with 3 implementations (Phone, Tablet & Laptop),
 * you also have 3 messaging strategies (Skype, WhatsApp, Facebook). 
 * The goal is to build an application where every device can interchangeably 
 * use every messaging platform using composition.
 */
echo "Bridge Pattern Example <br />";
interface DeviceInterface{
	public function setSender(MessageInterface $sender);
	
	public function send($body);
}

abstract class Device implements DeviceInterface{
	protected $sender;
	
	public function setSender(MessageInterface $sender){
		$this->sender = $sender;
	}
}

class Phone extends Device{
	public function send($body){
		$body .= "<br /> Sent from Phone";
		
		return $this->sender->send($body);
	}
}

class Tablet extends Device{
	public function send($body){
		$body .= "<br /> Sent from Tablet";
		
		return $this->sender->send($body);
	}
}

interface MessageInterface{
	public function send($body);
}

class Skype implements MessageInterface{
	public function send($body){
		// send message through skype API
		$body .= " using skype API";
		return $body;
	}
}

class Facebook implements MessageInterface{
	public function send($body){
		// sent message through facebook api
		$body .= " using facebook API";
		return $body;
	}
}

$phone = new Phone();
$phone->setSender(new Skype);
echo $phone->send("<br />Hey Buddy");
$phone->setSender(new facebook);
echo $phone->send("<br />Hey Buddy again");
$tablet = new Tablet();
$tablet->setSender(new Skype);
echo $tablet->send("<br />Hello Umair");
$tablet->setSender(new Facebook);
echo $tablet->send("<br />Hello Umair again");