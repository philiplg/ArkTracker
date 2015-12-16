<?php

class item {
	private static $ID;
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

	function SetType($value) {
		$this -> type = $value;
	}

	function GetType() {
		return $this -> type;
	}

}
