<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
require_once(dirname(__FILE__) . '/simpletest/autorun.php');
require_once('../classes/Date.php');

class TestDate extends UnitTestCase {

	public function testGetYear(){
		$name = new Date(2011, 12, 31);
		$this->assertEqual($name->getYear(), 2011);
	}
	public function testGetYear2(){
		$name = new Date(2013, 12, 31);
		$this->assertEqual($name->getYear(), 2013);
	}
	public function testGetMonthName1(){
		$name = new Date(2011, 12, 31);
		$this->assertEqual($name->getMonthName(), 'DecembeR');
	}
	public function testGetMonthName2(){
		$name = new Date(2011, 1, 31);
		$this->assertEqual($name->getMonthName(), 'JanuarY');
	}
	public function testGetMonth(){
		$name = new Date(2011, 12, 31);
		$this->assertEqual($name->getMonth(), 12);
	}

	public function testGetMonth2(){
		$name = new Date(2011, 10, 31);
		$this->assertEqual($name->getMonth(), 10);
	}
	public function testGetDay(){
		$name = new Date(2011, 12, 31);
		$this->assertEqual($name->getDay(), 31);
	}

	public function testInvalidDay(){
		try {
			$name = new Date (2011, 12, 32);
			$this->fail("InvalidDateException was expected...");
		} catch (InvalidDateException $e) {
			$this->assertEqual('32 is not a valid date; every month must be 1 - 31', $e->getMessage());
			$this->pass();
		} catch(Exception $e){
			$this->fail("InvalidDateException was expected");
		}
	}

	public function testInvalidYear(){
		try {
			$name = new Date(2012, 12, 31);
			$this->fail("InvalidDateException was expected... ");
		} catch (InvalidDateException $e) {
			$this->assertEqual('2012 invalid year; must be less than current (2011)',
			$e->getMessage());
			$this->pass();
		} catch(Exception $e){
			$this->fail("InvalidDateException was expected");
		}
	}

	public function testInvalidMonth(){
		try {
			$name = new Date (2011, 13, 31);
			$this->fail("InvalidDateException was expected... ");
		} catch (InvalidDateException $e) {
			$this->assertEqual('13 is not a valid month; must be 1 - 12',
			$e->getMessage());
			$this->pass();
		} catch(Exception $e){
			$this->fail("InvalidDateException was expected");
		}
	}
}
?>
}

