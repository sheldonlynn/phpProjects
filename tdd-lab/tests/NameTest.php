<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
require_once(dirname(__FILE__) . '/simpletest/autorun.php');
require_once('../classes/Name.php');

class NameTest extends UnitTestCase {

	public function testNameConstructorWithMiddle(){
		$name = new Name('tiger', 'woods', 'toNt');
		$this->assertEqual($name->getFirstName(), 'tiger');
		$this->assertEqual($name->getLastName(), 'woods');
		$this->assertEqual($name->getFullName(), 'tiger toNt woods');
		$this->assertEqual($name->getFullNamePretty(), 'Tiger Tont Woods');
		$this->assertEqual($name->getMiddleName(), 'toNt');
	}

	public function testNameConstructorWithoutMiddle(){
		$name = new Name('tiger', 'woods');
		$this->assertEqual($name->getFirstName(), 'tiger');
		$this->assertEqual($name->getLastName(),  'woods');
		$this->assertEqual($name->getFullName(),  'tiger woods');
		$this->assertEqual($name->getFullNamePretty(), 'Tiger Woods');
		$this->assertNull($name->getMiddleName());
	}

	public function testLastNameTooShort(){
		try {
			$name = new Name('tiger', 'w');
			$this->fail(
"InvalidNameLengthException was expected...how did we get here???");
		} catch (InvalidNameLengthException $e) {
$this->assertEqual('1 is too few characters for last name...min length is 2', 
$e->getMessage());
			$this->pass();
		} catch(Exception $e){
			$this->fail("InvalidNameLengthException was expected");
		}
	}

	
 
public function testFirstNameTooShort(){
		try {
			$name = new Name('t', 'woods');
			$this->fail(
"InvalidNameFormatException was expected...how did we get here???");
		} catch (InvalidNameLengthException $e) {
$this->assertEqual('1 is too few characters for first name...min length is 2', 
$e->getMessage());
			$this->pass();
		}  catch(Exception $e){
			$this->fail("InvalidNameLengthException was expected");
		}
	}

	public function testFirstNameFormat(){
		try {
			$name = new Name(1234, 'woods');
			$this->fail(
"InvalidNameFormatException was expected...how did we get here???");
		} catch (InvalidNameFormatException $e) {
			$this->assertEqual('1234 is not a valid first name...must contain one or more letters', 
$e->getMessage());
			$this->pass();
		}  catch(Exception $e){
			$this->fail("InvalidNameFormatException was expected");
		}
	}

	public function testLastNameFormat(){
		try {
			$name = new Name('tiger', '5678');
			$this->fail(
"InvalidNameFormatException was expected...how did we get here???");
		} catch (InvalidNameFormatException $e) {
$this->assertEqual('5678 is not a valid last name...must contain one or more letters', $e->getMessage());
			$this->pass();
		}  catch(Exception $e){
			$this->fail("InvalidNameFormatException was expected");
		}
	}

	public function testLastNameMaxLength(){
		$name = new Name('tiger', 'wooooooooooooooooooooooooooooods');
		$this->assertEqual($name->getLastName(), 'wooooooooooooooooooooooooooooods');
	}

	
 
public function testLastNameTooLong(){
		try {
			$name = new Name('tiger', 'woooooooooooooooooooooooooooooods');
			$this->fail(
"InvalidNameLengthException was expected...how did we get here???");
		} catch (InvalidNameLengthException $e) {
$this->assertEqual('33 is too many characters for last name...max length is 32', 
$e->getMessage());
			$this->pass();
		}  catch(Exception $e){
			$this->fail("InvalidNameLengthException was expected");
		}
	}

	public function testFirstNameMaxLength(){
		$name = new Name('tiiiiiiiiiiiiiiiiiiiiiiiiiiiiger', 'woods');
		$this->assertEqual($name->getFirstName(), 'tiiiiiiiiiiiiiiiiiiiiiiiiiiiiger');
	}

	public function testFirstNameTooLong(){
		try {
			$name = new Name('tiiiiiiiiiiiiiiiiiiiiiiiiiiiiiger', 'woods');
			$this->fail(
"InvalidNameFormatException was expected...how did we get here???");
		} catch (InvalidNameLengthException $e) {
			$this->assertEqual('33 is too many characters for first name...max length is 32', 
$e->getMessage());
			$this->pass();
		}  catch(Exception $e){
			$this->fail("InvalidNameLengthException was expected");
		}
	}
	
	public function testGetShortInitials(){
		$name = new Name('tiger', 'woods');
		$this->assertEqual($name->getShortInitials(), 'TW');
	}

	public function testGetLongInitials(){
		$name = new Name('tiger', 'woods');
		$this->assertEqual($name->getLongInitials(), 'T.W.');
	}

	public function testGetShortInitialsWithMiddleName(){
		$name = new Name('tiger', 'woods', 'tont');
		$this->assertEqual($name->getShortInitials(), 'TTW');
	}

	public function testGetLongInitialsWithMiddleName(){
		$name = new Name('tiger', 'woods', 'tont');
		$this->assertEqual($name->getLongInitials(), 'T.T.W.');
	}
	public function testSetNameFunctions(){
		$name = new Name('tiGEr', 'woODs', 'toNt');
		$this->assertEqual($name->getFirstName(), 'tiGEr');
		$this->assertEqual($name->getFirstNamePretty(), 'Tiger');
		$this->assertEqual($name->getLastName(), 'woODs');
		$this->assertEqual($name->getLastNamePretty(), 'Woods');
		$this->assertEqual($name->getMiddleName(), 'toNt');
		$this->assertEqual($name->getMiddleNamePretty(), 'Tont');
		$this->assertEqual($name->getFullName(), 'tiGEr toNt woODs');
		$this->assertEqual($name->getFullNamePretty(), 'Tiger Tont Woods');

		$name->setFirstName('wayne');
		$name->setMiddleName(null);
		$name->setLastName('gretzky');

		$this->assertEqual($name->getFirstName(), 'wayne');
		$this->assertNull($name->getMiddleName());
		$this->assertEqual($name->getLastName(), 'gretzky');
	}

	public function testSetFullName(){
		$name = new Name('tiger', 'woods');
		$name->setFullName('wayne', 'gretzky');
		$this->assertEqual($name->getFirstName(), 'wayne');
		$this->assertNull($name->getMiddleName());
		$this->assertEqual($name->getLastName(), 'gretzky');
	}

	public function testSetFullNameWithMiddle(){
		$name = new Name('tiger', 'woods');
		$name->setFullName('wayne', 'gretzky', 'douglas');
		$this->assertEqual($name->getFirstName(), 'wayne');
		$this->assertEqual($name->getMiddleName(), 'douglas');
		$this->assertEqual($name->getLastName(), 'gretzky');
	}

	public function testSetFullNameWithoutMiddle(){
		$name = new Name('tiger', 'woods', 'tont');
		$name->setFullName('wayne', 'gretzky');
		$this->assertEqual($name->getFirstName(), 'wayne');
		$this->assertNull($name->getMiddleName());
		$this->assertEqual($name->getLastName(), 'gretzky');
	}

 
	public function testSetFirstNameNull(){
		$name = new Name('tiger', 'woods');
		$this->assertEqual($name->getFirstName(), 'tiger');

		try {
			$name->setFirstName(null);
			$this->fail(
"InvalidNameFormatException was expected...how did we get here???");
		} catch (InvalidNameFormatException $e) {
			$this->assertEqual('first name must not be null', $e->getMessage());
				$this->pass();
		}  catch(Exception $e){
			$this->fail("InvalidNameFormatException was expected");
		}
	}

	public function testSetMiddleNameNull(){
		$name = new Name('tiger', 'woods', 'tont');
		$this->assertEqual($name->getMiddleName(), 'tont');

		$name->setMiddleName(null);

		$this->assertNull($name->getMiddleName());
	}

	public function testSetLastNameNull(){
		$name = new Name('tiger', 'woods');
		$this->assertEqual($name->getLastName(), 'woods');

		try {
			$name->setLastName(null);
			$this->fail(
"InvalidNameFormatException was expected...how did we get here???");
		} catch (InvalidNameFormatException $e) {
			$this->assertEqual('last name must not be null', $e->getMessage());
				$this->pass();
		}  catch(Exception $e){
			$this->fail("InvalidNameFormatException was expected");
		}
	}
}
?>
