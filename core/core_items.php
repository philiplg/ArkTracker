<?php

class item {
	private static $ID;
	private $name;
	private $type;
	private $weight;
	private $stack;
	private $craftXP;
	private $craftedIn;
	private $resources = array();

	function SetID($value) {
		if (is_numeric($value)) {
			$this -> ID = $value;
		} else {
			return "Item number can only be an integer";
		}
	}

	function GetID() {
		return $this -> ID;
	}
	
	function SetName($value) {
		$this -> name = $value;
	}

	function GetName() {
		return $this -> name;
	}

	function SetType($value) {
		$this -> type = $value;
	}

	function GetType() {
		return $this -> type;
	}

	function SetWeight($value) {
		if (is_numeric($value)) {
			$this -> weight = $value;
		} else {
			return "Item weight can only be an integer";
		}
	}

	function GetWeight() {
		return $this -> weight;
	}
	
	function SetStack($value) {
		if (is_numeric($value)) {
			$this -> stack = $value;
		} else {
			return "Item stack can only be an integer";
		}
	}

	function GetStack() {
		return $this -> stack;
	}
	
	function SetXP($value) {
		if (is_numeric($value)) {
			$this -> craftXP = $value;
		} else {
			return "Item XP gain can only be an integer";
		}
	}

	function GetXP() {
		return $this -> craftXP;
	}
	
	function SetCraftedIn($value) {
		$this -> craftedIn = $value;
	}

	function GetCraftedIn() {
		return $this -> craftedIn;
	}
	
	function AddItemsRequired($key, $value) {
		$this -> resources[$key] = $value;
	}
	
	function AddItemsRequiredByArray($value) {
		$this -> resources = $value;
	}

	function GetItemsRequired() {
		return $this -> resources;
	}

}

?>
