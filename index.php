<?php

require_once('class\RuleEngine.php');
require_once('class\Rule.php');

use Class\RuleEngine\RuleEngine;
use Class\Rule\Rule;

// simple input
$number = isset($_GET['n'])?$_GET['n']:1;

// simple data to verify
$rules = array(
	0 => array('condition' => '%', 'value' => 2),
	1 => array('condition' => '<', 'value' => 1),
	2 => array('condition' => '>', 'value' => 7),
	3 => array('condition' => '%', 'value' => 3),
	4 => array('condition' => '==', 'value' => 4),
	5 => array('condition' => '!=', 'value' => 5)
);

$ruleEngine = new RuleEngine();

foreach($rules AS $key => $value) {
	$rule = new Rule($value['condition'], $value['value']);
	$ruleEngine->setRule($rule);
}

$ruleEngine->applyRules($number);

?>