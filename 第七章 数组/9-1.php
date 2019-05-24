<?php
	function maxSubArray($arr) {  
	    $len = count($arr);
	    $maxSum = min($arr);
	    for($i = 0; $i < $len; $i++) {
	        $sum = 0;
	        for($j = $i; $j < $len; $j++) {
	            $sum += $arr[$j];
	            if($sum > $maxSum) {
	               $maxSum = $sum;
	            }
	        }
	    }
	    return $maxSum;
	}
?>