<?php

class InvalidNameLengthException extends Exception{
	public function __construct($m){
		parent::__construct($m);
	}
}