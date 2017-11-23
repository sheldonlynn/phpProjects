<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
require_once(dirname(__FILE__) . '/simpletest/autorun.php');
require_once('../classes/Math.php');

class TestMath extends UnitTestCase {
	public function testSquareArea(){
		$area = Math::getSquareArea(8);
		$this->assertTrue($area == 64);
	}
	
	// we can improve on this
	public function testSquareAreaException(){
		try {
			$area = Math::getSquareArea('jason was here');	
			$this->fail(
"InvalidArgumentException was expected...how did we get here???");
		} catch (InvalidArgumentException $e) {
			$this->assertEqual('jason was here is not a valid square side value...must be numeric', 
$e->getMessage());
			$this->pass();
		} catch(Exception $e){
			$this->fail("InvalidArgumentException was expected");
		}
}

	public function testGetCircleArea(){
		$area = Math::getCircleArea(8);
		$this->assertWithinMargin($area, 3.14159 * 64.0, 0.01);
	}

	public function testAdd(){
		$m = Math::getSum(5, 10);
		$this->assertEqual($m, 15);
	}

	public function testAddType(){
		$m = Math::getSum(5.0, 10.0);
		$this->assertIsA($m, 'float');	
	}

	public function testSetMd5Hash(){
		$md5 = Math::getMd5Hash('jason');
		$this->assertPattern('/[a-zA-Z0-9]{32}/', $md5);
		$this->assertEqual($md5, md5('jason'));
	}
}
?>
