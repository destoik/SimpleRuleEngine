<?php
namespace Class\Rule;

class Rule {
	private $compare;
	private $fn;

    public function __construct($operator, $compare) {
    	$this->compare = $compare;
    	$this->fn = $this->buildRule($operator);
	}

	function buildRule($operator){
		switch ($operator) {
			case '<':
				return function($number, $compare){ echo 'lesserX('.$number.','.$compare.')?<br>'; return $this->lesserX($number, $compare); };
				break;

			case '>':
				return function($number, $compare){ echo 'greaterX('.$number.','.$compare.')?<br>'; return $this->greaterX($number, $compare); };
				break;

			case '%':
				return function($number, $compare){ echo 'isModX('.$number.','.$compare.')?<br>'; return $this->isModX($number, $compare); };
				break;

			case '==':
				return function($number, $compare){ echo 'equalX('.$number.','.$compare.')?<br>'; return $this->isX($number, $compare); };
				break;

			case '!=':
				return function($number, $compare){ echo 'notX('.$number.','.$compare.')?<br>'; return $this->isNotX($number, $compare); };
				break;
			
			default:
				return false;
				break;
		}
	}

	function isX($a,$b){
		return $a == $b;
	}

	function isNotX($a,$b){
		return $a != $b;
	}

	function isModX($a,$b){
		return $a % $b == 0;
	}

	function greaterX($a,$b){
		return $a > $b;
	}

	function lesserX($a,$b){
		return $a < $b;
	}

	public function evaluateRule($number){
		if(call_user_func($this->fn, $number, $this->compare)) return true;
		else return false;
	}
}
?>