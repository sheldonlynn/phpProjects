<?php

function __autoload($class){
	require_once($class . ".php");
}

class Name{
	
	private $first;
	private $last;
	private $middle;
	
	public function __construct($f, $l, $m = ""){
		
		if(!is_string($f)){
			throw new InvalidNameFormatException(
			$f . " is not a valid first name...must contain one or more letters");
			
		}
		
		if(!preg_match("/[a-z]/i", $l)){
			throw new InvalidNameFormatException(
			$l . " is not a valid last name...must contain one or more letters");
			
		}		
		
		
		if(strlen($f) < 2){
			throw new InvalidNameLengthException(
				strlen($f) . " is too few characters for first name...min length is 2");
		}		
		
		
		if(strlen($f) > 32){
			throw new InvalidNameLengthException(
				strlen($f) . " is too many characters for first name...max length is 32");
		}			
		
		
		
		$this->first  = $f;
		
		
		if(strlen($l) < 2){
			throw new InvalidNameLengthException(
				strlen($l) . " is too few characters for last name...min length is 2");
		}
		
		if(strlen($l) > 32){
			throw new InvalidNameLengthException(
				strlen($l) . " is too many characters for last name...max length is 32");
		}		
		
		$this->last   = $l;
		$this->middle = $m;
	}
		
	public function getFirstName(){
		
		return $this->first;
	}
		
	public function getLastName(){
		
		return $this->last;
	}		
	
	public function getMiddleName(){
		if($this->middle == ""){
			return null;
		}
		return $this->middle;
	}			
	


	public function getFullName(){
		if($this->middle != ""){
			return $this->first . ' ' . $this->middle .
			       ' ' . $this->last;			
		}else{
			return $this->first . ' ' . $this->last;
			
			
		}
	}
	
	public function getFullNamePretty(){
		
		
		$f = strtolower($this->first);
		$m = strtolower($this->middle);
		$l = strtolower($this->last);
		
		$f = ucfirst($f);
		$m = ucfirst($m);
		$l = ucfirst($l);
		
		
		
		if($this->middle != ""){
			return $f . ' ' . $m . ' ' . $l;			
		}else{
			return $f . ' ' . $l;
			
			
		}
	}
	
	
	
}