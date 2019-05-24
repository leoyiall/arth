<?php
	function isPower($n){
	    if($n<1) 
	        return false;
	    $m=$n&($n-1);
	    return $m==0;
	}
?>