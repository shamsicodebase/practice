<?php
require_once __DIR__.'/../classes/functions.php';

class checkFormatTest extends TestCase{
	
	public function testFormat(){
		$this->assertTrue(checkResponseformat('json'));
	}
}