<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
require_once('../simpletest/autorun.php');

require_once('../classes/Arithmetic.php');
class TestArithmetic extends UnitTestCase {

	private $a;

	public function setUp()
	{
		$this->a = new Arithmetic();
		echo "setting up...";
	}
	
	public function tearDown()
	{
		echo "tearing down...";
	}

	public function testAdd()
	{
		echo "test add";
		
		$sum = $this->a->add(5, 7);
		
		$this->assertEqual($sum, 12);
	}
	
	public function testAdd2()
	{
		
		$sum = $this->a->add(-5, 300);
		
		$this->assertEqual($sum, 295);
	}	
	
	public function testAddExceptions()
	{
		
		
		try{
			$sum = $this->a->add("hello", 6);
			$this->fail();
		}catch(InvalidArgumentException $e){
			$this->assertEqual($e->getMessage(), "hello is not an int!");
			
		}catch(Exception $e){
			$this->fail();
		}
		
		try{
			$sum = $this->a->add(5, "whatever");
			$this->fail();
		}catch(InvalidArgumentException $e){
			$this->assertEqual($e->getMessage(), "whatever is not an int!");
			
		}catch(Exception $e){
			$this->fail();
		}		
		
		try{
			$sum = $this->a->add(5, "whatever", "e", 5.6);
			$this->fail();
		}catch(UnexpectedValueException $e){
			$this->assertEqual($e->getMessage(), "required args: 2; actual args: 4");
			
		}catch(Exception $e){
			$this->fail();
		}			
		
	}
	
	
	
	
	
	
	
}
?>
