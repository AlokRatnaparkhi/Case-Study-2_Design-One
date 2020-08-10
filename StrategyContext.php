<?php

class StrategyContext {
	
    private $strategy = NULL; 
   
    public function __construct(StrategyInterface $strategy) {
			$this->strategy=$strategy;
            
        
    }
    public function executeSecurityStrategy($str) {
      return $this->strategy->isVulnerabilityPresent($str);
    }
}

interface StrategyInterface {
    public function isVulnerabilityPresent($str);
}
 
class XSS implements StrategyInterface {
    public function isVulnerabilityPresent($str) {
        
		$pattern = "/script|<|%|document|\.|alert|cookie/i";
		$i= preg_match($pattern, $str); 
		
		if($i==1)
		{
			return true;
		}
		else
		{
			return false;
		}
		
        
    }
}

class SQLi implements StrategyInterface {
    public function isVulnerabilityPresent($str) {
      
	
		$pattern = "/\'|select|insert|delete|update|drop|truncate|\*|from|where|%|union|and|or|\-|alter/i";
		$i= preg_match($pattern, $str); 
		
		if($i==1)
		{
			return true;
		}
		else
		{
			return false;
		}
	  
	  
       
    }
}

?>