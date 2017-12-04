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
	
    public function getShortInitials() {
        if($this->middle == "") {
            return strtoupper($this->first[0]) . strtoupper($this->last[0]);
        } else {
            return strtoupper($this->first[0]) . strtoupper($this->middle[0]) . strtoupper($this->last[0]);
        }
    }

    public function getLongInitials() {
        if($this->middle == "") {
            return strtoupper($this->first[0]) . '.' . strtoupper($this->last[0]) . '.';
        } else {
            return strtoupper($this->first[0]) . '.' . strtoupper($this->middle[0]) . '.' . strtoupper($this->last[0]) . '.';
        }
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

	public function getFirstNamePretty() {
        return ucfirst(strtolower($this->first));
    }

    public function getLastNamePretty() {
        return ucfirst(strtolower($this->last));
    }


    public function getMiddleNamePretty() {
        return ucfirst(strtolower($this->middle));
    }

    public function setFirstName($f) {
        if (!isset($f))  {
            throw new InvalidNameFormatException('first name must not be null');
        }

        $this->first = $f;
    }

    public function setMiddleName($m) {
        $this->middle = $m;
    }

    public function setLastName($l) {
        if (!isset($l))  {
            throw new InvalidNameFormatException('last name must not be null');
        }
        $this->last = $l;
    }

    public function setFullName($f, $l, $m = '') {
        $this->first = $f;
        $this->middle = $m;
        $this->last = $l;
    }
}