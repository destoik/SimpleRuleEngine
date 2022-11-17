<?php
namespace Class\RuleEngine;

class RuleEngine{
	private array $rules;

    public function setRule($rule)
    {
        $this->rules[] = $rule;
    }

    public function applyRules($number)
    {
        foreach ($this->rules as $rule) {
            $result = $rule->evaluateRule($number);
            if($result) echo $result.' true<br>';
            else echo '0 false<br>';
        }    
    }
}


?>