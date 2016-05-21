<?php
trait Validations{
	function isValidInteger($value){
		if(!is_int($value)){
			throw(new Exception('Value is not an integer'));
		}
		return true;
	}

	function isValidDate($value){
		
	}
}